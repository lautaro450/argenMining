<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Contract;
use App\Entity\User;
use App\Form\UserContractType;  
use App\Form\ContractType;  
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContractController extends Controller
{

    public function testGetUser($userId)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $user = $repository->find($userId);
        if(is_array($user) == true)
        {
            return new Response('ARRAY');
        }
        if(is_object($user) == true)
        {
            return new Response('OBJETO');
        }   

        return new Response('NO ES ARRAY NI OBJETO');

    }

    public function asignarContrato(Request $request)
    {        
        $helper = $this->get('Helper');
        $email = $helper->getAllUsers();
        $userId =  $request->request->get('id');
     //   $contract1 = new Contract();
     //   $contract1->setCurrency('XMR');
     //   $user->getContracts()->add($contract1);
        if(!empty($userId))
        {
            $hashrate =  $request->request->get('hashrate');
            $currency =  $request->request->get('currency');
            $username = $helper->getUsernameById($userId);
            if(!empty($hashrate) && !empty($currency))
            {
                $state = 0;
                $testUser = new User();
                $contract = new Contract();
                $contract->setCurrency($currency);
                $contract->setHashrate($hashrate);
                $contract->setState($state);
                $contract->setUsername($userId);


                $em = $this->getDoctrine()->getManager();
                $em->persist($contract);
                $em->flush();
                return new Response('SUCCESS');
            }
            else
            {        

                return $this->render('admin/asignarContrato.html.twig', array(
            'userSelected' => $username));

            }

        }
        else
        {
            return $this->render('admin/asignarContrato.html.twig', array(
                'users' => $email,
            ));

        }
    }
    /**
     * @Route("/contract", name="contract")
     */
    public function contractAction(Request $request)
    {

    }
}

/*


        // 1) construir formulario
        $contract = $this->getDoctrine()
            ->getRepository()
        $form = $this->createFormBuilder($contract)
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('address', TextType::class)
            ->getForm();

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $plainPassword = $user->getPlainPassword();
            $user->setPlainPassword($plainPassword);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('register/success');
        }

        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
        */