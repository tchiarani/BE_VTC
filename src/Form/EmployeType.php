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
            ->add('nomEmp', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('prenomEmp', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('telEmp', TextType::class, [
                'label' => 'Téléphone',
            ])
            ->add('tempTravailEmp', TextType::class, [
                'label' => 'Temps travaillé',
            ])
            ->add('loginEmp', TextType::class, [
                'label' => 'Login',
            ])
            ->add('passwordEmp', TextType::class, [
                'label' => 'Passeword',
            ]);


    }
}