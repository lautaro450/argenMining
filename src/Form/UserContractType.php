<?php
// src/Form/Type/UserContractType.php
namespace App\Form;

use App\Entity\User;
use App\Form\ContractType;  
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserContractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username');

        $builder->add('contracts', CollectionType::class, array(
            'entry_type' => ContractType::class,
            'entry_options' => array('label' => false),
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}