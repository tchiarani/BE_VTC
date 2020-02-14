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
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('tel', TextType::class, [
                'label' => 'Téléphone',
            ])
            ->add('tempTravail', TextType::class, [
                'label' => 'Temps travaillé',
            ])
            ->add('login', TextType::class, [
                'label' => 'Login',
            ])
            ->add('password', TextType::class, [
                'label' => 'Password',
            ])
            ->add('roles', TextType::class, [
                'label' => 'Roles',
            ]);


    }
}