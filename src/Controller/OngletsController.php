<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OngletsController extends AbstractController
{
    #[Route('/onglets', name: 'app_onglets')]
    public function index(): Response
    {
        return $this->render('onglets/index.html.twig', [
            'controller_name' => 'OngletsController',
        ]);
    }
}
