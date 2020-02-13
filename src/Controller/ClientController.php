<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Client;
use App\Service\AntiSpam;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="index_client")
     */
    public function index(EntityManagerInterface $em)
    {

        $req = $em->getRepository('App:Client')->findAll();

        return $this->render('client/index.html.twig', [
            'clients' => $req,
            'controller_name' => 'ClientController',
        ]);
    }


    /**
     * @Route("/client/{id}", name="view_client"),
     *
     */
    public function viewClient($id, EntityManagerInterface $em)
    {
        $client = $em->getRepository('App:Client')->findOneBy(array('id' => $id));
        return $this->render('client/index.html.twig', [
            'clients' => $client,
        ]);
    }

    /** @Route ("/client/add",
     *  name="add_client",)
     */
    public function addAction(EntityManagerInterface $em,Request $request){
        $client = new Client();
        $form=$this->createForm(clientType::class, $client);
        $form->add('send',SubmitType::class, ['label'=>'Ajouter un client', 'attr' => [
            'class' => 'mt-3 btn-primary'
        ]]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($client);
            $em->flush();
            $this->addFlash('success',"Tout s'est bien passé");
            return $this->redirectToRoute('list_client');
        }
        return $this->render('client/index.html.twig', array('form'=>$form->createView()));
    }



}
