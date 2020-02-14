<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $em)
    {
        $employes = $em->getRepository('App:Client')->findAll();
        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
            'employes' => $employes,
        ]);
    }


    /**
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $entityManager) {
        return $this->json($entityManager->getRepository(Client::class)->findAll());
    }
}
