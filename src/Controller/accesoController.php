<?php
// src/Controller/HomeController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\User\UserInterface;


class accesoController extends Controller
{

	public function login(Request $request, AuthenticationUtils $authUtils, UserInterface $user = null)
	{

	    // get the login error if there is one
	    $error = $authUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authUtils->getLastUsername();
	    	if($user != null)
	    	{
				$userRole = $user->getRoles();
				
				if(in_array('ROLE_USER', $userRole))
				{
					return $this->render('panel/panel.html.twig');
				}
				if(in_array('ROLE_ADMIN', $userRole))
				{
					return $this->render('admin/panel.html.twig');
				}
	    	}

	    return $this->render('acceso/index.html.twig', array(
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ));
	}
}
?>