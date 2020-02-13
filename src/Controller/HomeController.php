<?php

namespace App\Controller;

use App\Entity\Client;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EntityManagerInterface $em)
    {

        //$clients=$em->getRepository('App:Client')->findAll();
        $req = $em->getRepository('App:Client')->findAll();

        return $this->render('index.html.twig', [
            'clients' => $req,
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function test(EntityManagerInterface $entityManager) {
        return $this->json($entityManager->getRepository(Client::class)->findAll());
    }
}
