<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{

    #[Route('/menu', name: 'app_menu')]
    public function menu(): Response
    {
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }

    #[Route('/menu1', name: 'app_menu1')]
    public function menu1(): Response
    {
        return $this->render('menu/index.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }

    #[Route('/menu2', name: 'app_menu2')]
    public function menu2(): Response
    {
        return $this->render('menu/index2.html.twig', [
            'controller_name' => 'MenuController',
        ]);
    }


}// class
