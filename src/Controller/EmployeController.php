<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * @Route ("/view/{id}", name="view_employe", requirements={"id": "\d+"})
     */
    public function viewAction(Employe $employe, EntityManagerInterface $em)
    {
        if($employe){
            $em->flush();
            return $this->render('employe/view.html.twig',['employe' => $employe] );
        }
        throw new NotFoundHttpException('Employe inconnu');
    }

    /**
     * @Route("/add", name="add_employe")
     */
    public function addAction(EntityManagerInterface $em,Request $request){
        $employe = new Employe();

        $form=$this->createForm(EmployeType::class, $employe);
        $form->add('send',SubmitType::class, ['label'=>'Ajouter', 'attr' => ['class' => 'btn btn-dark mt-4']]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($employe);
            $em->flush();
            $this->addFlash('success','Success');
            return $this->redirectToRoute('list_employe');
        }
        return $this->render('employe/add.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route ("/employe/edit/{id}", name="edit_employe", requirements={"id":"\d+"}, methods={"GET", "POST"})
     */
    public function editAction(EntityManagerInterface $em, Request $request, int $id){
        $employe = $em->getRepository(Employe::class)->find($id);


        $form=$this->createForm(EmployeType::class, $employe);
        $form->add('send',SubmitType::class, ['label'=>'Modifier', 'attr' => ['class' => 'btn btn-dark mt-4']]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em->flush();
            $this->addFlash('success', 'Modification effectuée');
            return $this->redirectToRoute('view_employe', ['id' => $id]);
        }
        return $this->render('employe/edit.html.twig', ['form'=>$form->createView()]);
    }

}
