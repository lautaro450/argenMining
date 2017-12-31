<?php
// src/Controller/ContactoController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class ContactoController extends Controller
{
    public function indexAction()
    {
		return $this->render('contacto/index.html.twig');
    }
}
?>