<?php
// src/Controller/panelController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contract;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class panelController extends Controller
{
	public function test(UserInterface $user)
	{
		$userRole = $user->getRoles();
		return new Response($userRole[0]);
	}
	public function indexAction(UserInterface $user)
	{

		$userRole = $user->getRoles();
		if(in_array('ROLE_USER', $userRole))
		{
        	$helper = $this->get('Helper');
			$contracts = $helper->getContractsByUserId($user->getId());
    		$repository = $this->getDoctrine()->getRepository(Contract::class);

			return $this->render('panel/panel.html.twig', array(
				'contracts' => $contracts));
		}
		if(in_array('ROLE_ADMIN', $userRole))
		{
			return $this->render('admin/panel.html.twig');
		}
	}
	public function getUserName(UserInterface $user)
    {	

        $userId = $user->getId(); 
    	$repository = $this->getDoctrine()->getRepository(User::class);
    	$userInfo = $repository->findOneBy(['id' => $userId]);
    	$response = new Response($userInfo->username);
        return $response;
    }

    public function soporteTecnico()
    {
    	return $this->render('panel/soporte_tecnico.html.twig');
    }

    public function configuracion(Request $request, UserInterface $dataUser)
    {
    	//si ya recibimos los datos del formulario

    	//Primero obtenemos el usuario y definimos el entitymanager

    	$em = $this->getDoctrine()->getManager();
    	$helper = $this->get('Helper');
    	$userInfo = $helper->getUsernameById($dataUser->getId());

    	//guardamos en variables los datos del _post (entity user)

		$wEth = $request->request->get('wallet_eth');
		$wEtc = $request->request->get('wallet_etc');
		$wLbry = $request->request->get('wallet_lbry');
		$wPasl = $request->request->get('wallet_pasl');
		if(is_null($wEth) == false || is_null($wEtc) == false ||  is_null($wLbry) == false || is_null($wPasl) == false)
		{
			$userInfo->setWalletEth($wEth);
			$userInfo->setWalletEtc($wEtc);
			$userInfo->setWalletLbry($wLbry);
			$userInfo->setWalletPasl($wPasl);
			$em->flush();

		}


        return $this->render(
            'panel/configuracion.html.twig',
            array('userInfo' => $userInfo));

    }

   public function datos(Request $request, UserInterface $dataUser)
    {
    	//si ya recibimos los datos del formulario

    	//Primero obtenemos el usuario y definimos el entitymanager

    	$em = $this->getDoctrine()->getManager();
    	$helper = $this->get('Helper');
    	$userInfo = $helper->getUsernameById($dataUser->getId());

    	//guardamos en variables los datos del _post

		$firstName = $request->request->get('firstName');
		$lastName = $request->request->get('lastName');
		$address = $request->request->get('address');
		if(is_null($firstName) == false || is_null($lastName) == false || is_null($address) == false)
		{
			$userInfo->setFirstName($firstName);
			$userInfo->setLastName($lastName);
			$userInfo->setAddress($address);
			$em->flush();

		}

    	// 1) build the form


        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('address', TextType::class)
            ->getForm();

        return $this->render(
            'panel/personalData.html.twig',
            array('form' => $form->createView(), 'userInfo' => $userInfo)
        );;
    }
    public function updateAction($id)
	{
    	$repository = $this->getDoctrine()->getRepository(User::class);

	    $em = $this->getDoctrine()->getManager();
	    $product = $em->getRepository(Product::class)->find($id);

	    if (!$product) {
	        throw $this->createNotFoundException(
	            'No product found for id '.$id
	        );
	    }

	    $product->setName('New product name!');
	    $em->flush();

	    return $this->redirectToRoute('product_show', [
	        'id' => $product->getId()
	    ]);
	}

	public function eth(UserInterface $user)
	{
        $helper = $this->get('Helper');
        $accountBalance = $helper->getAccountBalance($wallet = '');
        $chartData = $helper->getChartData($wallet, $worker = '');
        $contract = $helper->getContractsByUserId($user->getId()
        	);
        foreach($chartData['data'] as $data)
        {
        	$datetime[] = $data['date'];
        	$hashrate[] = $data['hashrate'];
        }
		return $this->render('panel/currency/eth.html.twig', array(
				'data' => $accountBalance,
				'contracts' => $contract,
				'datetime' => $datetime,
				'hashrate' => $hashrate
			));

	}

	public function lbry(UserInterface $user)
	{
        $helper = $this->get('Helper');
        $accountBalance = $helper->getAccountBalance($wallet = '');
        $chartData = $helper->getChartData($wallet, $worker = '');
        $contract = $helper->getContractsByUserId($user->getId()
        	);
        foreach($chartData['data'] as $data)
        {
        	$datetime[] = $data['date'];
        	$hashrate[] = $data['hashrate'];
        }
		return $this->render('panel/currency/eth.html.twig', array(
				'data' => $accountBalance,
				'contracts' => $contract,
				'datetime' => $datetime,
				'hashrate' => $hashrate
			));

	}


}
?>