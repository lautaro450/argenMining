<?php
// src/Controller/systemController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class systemController extends Controller
{
    public function loginAction()
    {
		return $this->render('home/index.html.twig');
    }

    public function login(Request $request)
    {
    	$authUtils = $this->get('security.authentication_utils');
	    // get the login error if there is one
	    $error = $authUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authUtils->getLastUsername();

	    return $this->render('acceso/login.html.twig', array(
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ));    
	}

	public function panel()
	{
		return $this->render('acceso/panel.html.twig');
	}
}
?>