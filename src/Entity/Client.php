<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="idclient")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="nomClient")
     */
    private $nomClient;

    /**
     * @ORM\Column(type="string", length=255, name="prenomClient")
     */
    private $prenomClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $portable;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nomClient;
    }

    public function setNom(string $nom): self
    {
        $this->nomClient = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenomClient = $prenom;

        return $this;
    }

    public function getPortable(): ?string
    {
        return $this->portable;
    }

    public function setPortable(string $portable): self
    {
        $this->portable = $portable;

        return $this;
    }
}
