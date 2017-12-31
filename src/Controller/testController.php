<?php
// src/Controller/testController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;



class testController extends Controller
{

    public function indexAction()
    {

		return $this->render('home/index.html.twig');
    }

    public function testAction()
    {
		$request = Request::createFromGlobals();
		$id = $request->request->get('id');

		if($id == 'inicio')
		{
			$response = $this->forward('App\Controller\contactoController::indexAction');
		}
		return $response;
    }
}
?>