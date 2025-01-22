<?php

namespace App\Controller;

use App\Entity\Agenda;
use App\Repository\AgendaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AgendaRepository $agendaRepository): Response
    {

        $events = $agendaRepository->findAll();

        return $this->render('home/index.html.twig', [
            'events' => $events, 
        ]);
    }
}
