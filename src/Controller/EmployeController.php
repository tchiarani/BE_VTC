<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/employe")
 */

class EmployeController extends AbstractController
{
    /**
     * @Route("/list", name="list_employe")
     */
    public function listAction(EntityManagerInterface $em)
    {
         $employes=$em->getRepository(Employe::class)->findAll();
        return $this->render('employe/list.html.twig', [
            'employes' => $employes,
        ]);
    }

    /**
     * @Route("/add", name="add_employe")
     */
    public function addAction(EntityManagerInterface $em,Request $request){
        $employe = new Employe();

        $form=$this->createForm(EmployeType::class, $employe);
        $form->add('send',SubmitType::class, ['label'=>'Ajout']);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
//            if ($antiSpam->isSpam($employe->getContent())) {
//                $this->addFlash('danger',$translator->trans('controller.spam.error'));
//                return $this->render('employe/add.html.twig', array('form'=>$form->createView()));
//            }
//
            $em->persist($employe);
            $em->flush();
           // $this->addFlash('success','Success');
            return $this->redirectToRoute('list_employe');
        }
        return $this->render('employe/add.html.twig', array('form'=>$form->createView()));
    }


}
