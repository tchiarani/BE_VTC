<?php

namespace App\Controller;

use App\Entity\Employe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route(name="security-")
 */
class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authUtils)
    {
        return $this->render('security/login.html.twig', [
            'error' => $authUtils->getLastAuthenticationError(),
            'last_username' => $authUtils->getLastUsername()
        ]);
    }

    /**
     * @Route("/login-check", name="login-check")
     */
    public function loginCheck()
    {
        throw new \Exception("ERREUR APPEL LOGIN");
    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        throw new \Exception("ERREUR APPEL LOGOUT");
    }
}
