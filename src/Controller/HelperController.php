<?php
// src/Controller/helperController.php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Contract;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class HelperController extends Controller
{

    public function indexAction()
    {

		return $this->render('home/index.html.twig');
    }

    public function callControllerAction()
    {
		$request = Request::createFromGlobals();
		$id = $request->request->get('id');

		if($id == 'inicio')
		{
			$response = $this->forward('App\Controller\HomeController::indexAction');
		}
		if($id == 'contacto')
		{
			$response = $this->forward('App\Controller\ContactoController::indexAction');
		}
		if($id == 'acceso')
		{
			$response = $this->forward('App\Controller\accesoController::login');
		}
		if($id == 'showPersonalData')
		{
			$response = $this->forward('App\Controller\panelController::showPersonalData');
		}
		if($id == 'logOut')
		{
        	$response = $this->forward($this->routeToControllerName('logout'));
		}
		if($id == 'panel')
		{
        	$response = $this->forward('App\Controller\systemController::panel');
		}
		if($id == 'soporte_tecnico')
		{
        $response = $this->forward('App\Controller\panelController::soporteTecnico');
		}
		return $response;
    }

    public function getUsernameById($userId)
    {
        $obj = $this
        		->getDoctrine()
        		->getRepository(User::class)
        		->findOneById($userId);
        return $obj;

    }

    public function getContractsByUserId($userId)
    {
		$repository = $this->getDoctrine()->getRepository(Contract::class);
		$contracts = $repository->findBy(['username' => $userId]);
        return $contracts;

    }

    public function getAllUsers()
    {
        $em = $this->container->get('doctrine')->getManager();
        $users = $em->getRepository(User::class)
        ->findAll();
        return $users;
    }
    public function getAccountBalance($wallet = '0x280f171349a1505b14fd16b9bd1e775831186ca1')
    {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.nanopool.org/v1/eth/balance/0x280f171349a1505b14fd16b9bd1e775831186ca1",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$responseJson = json_decode($response, true);
		$err = curl_error($curl);
		curl_close($curl);
		return $responseJson;
    }
    public function getChartData($wallet = '0x280f171349a1505b14fd16b9bd1e775831186ca1', $worker = '192.168.1.100')
    {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.nanopool.org/v1/eth/hashratechart/0xe9f79bb6188271a0ce7238343fa9450ae127c62d/busan0004-0258",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$responseJson = json_decode($response, true);
		$err = curl_error($curl);
		curl_close($curl);
		return $responseJson;
    }
}
?>