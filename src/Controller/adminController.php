<?php
// src/Controller/HomeController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class adminController extends Controller
{
    public function indexAction()
    {
		return $this->render('admin/index.html.twig');
    }
}
?>