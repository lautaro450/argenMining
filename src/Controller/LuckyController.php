<?php
// src/Controller/LuckyController.php
namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;


class LuckyController extends Controller
{
    public function number()
    {
		return $this->render('article/test.html');
    }
}
?>