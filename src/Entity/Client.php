<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="IDCLIENT")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="nomClient", name="NOMCLIENT")
     */
    private $nomClient;


    /**
     * @ORM\Column(type="string", length=255, name="prenomClient", name="PRENOMCLIENT")
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=255, name="PORTABLE")
     */
    private $portable;

    /**
     * @return mixed
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * @param mixed $nomClient
     */
    public function setNomClient($nomClient): void
    {
        $this->nomClient = $nomClient;
    }

    /**
     * @return mixed
     */
    public function getPrenomClient()
    {
        return $this->prenomClient;
    }

    /**
     * @param mixed $prenomClient
     */
    public function setPrenomClient($prenomClient): void
    {
        $this->prenomClient = $prenomClient;
    }

    /**
     * @return mixed
     */
    public function getPortable()
    {
        return $this->portable;
    }

    /**
     * @param mixed $portable
     */
    public function setPortable($portable): void
    {
        $this->portable = $portable;
    }




}
