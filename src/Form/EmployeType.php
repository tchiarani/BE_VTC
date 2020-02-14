<?php


namespace App\Form;

use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('tel', TextType::class, [
                'label' => 'Téléphone',
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('tempTravail', TextType::class, [
                'label' => 'Temps travaillé',
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('login', TextType::class, [
                'label' => "Nom d'utilisateur",
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('password', TextType::class, [
                'label' => 'Mot de passe',
                'attr' => ['class' => 'form-control w-100']
            ])
            ->add('roles', TextType::class, [
                'label' => 'Rôles',
                'attr' => ['class' => 'form-control w-100']
            ]);


    }
}