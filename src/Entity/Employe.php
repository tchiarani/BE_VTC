<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeRepository")
 */
class Employe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $NomEmp;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $PrenomEmp;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $LoginEmp;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $PasswordEmp;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $TelEmp;

    /**
     * @ORM\Column(type="integer")
     */
    private $TempTravailEmp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Roles", inversedBy="employes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $NomRole;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Chauffeur", mappedBy="IdEmp", cascade={"persist", "remove"})
     */
    private $chauffeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmp(): ?string
    {
        return $this->NomEmp;
    }

    public function setNomEmp(string $NomEmp): self
    {
        $this->NomEmp = $NomEmp;

        return $this;
    }

    public function getPrenomEmp(): ?string
    {
        return $this->PrenomEmp;
    }

    public function setPrenomEmp(string $PrenomEmp): self
    {
        $this->PrenomEmp = $PrenomEmp;

        return $this;
    }

    public function getLoginEmp(): ?string
    {
        return $this->LoginEmp;
    }

    public function setLoginEmp(string $LoginEmp): self
    {
        $this->LoginEmp = $LoginEmp;

        return $this;
    }

    public function getPasswordEmp(): ?string
    {
        return $this->PasswordEmp;
    }

    public function setPasswordEmp(string $PasswordEmp): self
    {
        $this->PasswordEmp = $PasswordEmp;

        return $this;
    }

    public function getTelEmp(): ?string
    {
        return $this->TelEmp;
    }

    public function setTelEmp(string $TelEmp): self
    {
        $this->TelEmp = $TelEmp;

        return $this;
    }

    public function getTempTravailEmp(): ?int
    {
        return $this->TempTravailEmp;
    }

    public function setTempTravailEmp(int $TempTravailEmp): self
    {
        $this->TempTravailEmp = $TempTravailEmp;

        return $this;
    }

    public function getNomRole(): ?Roles
    {
        return $this->NomRole;
    }

    public function setNomRole(?Roles $NomRole): self
    {
        $this->NomRole = $NomRole;

        return $this;
    }

    public function getChauffeur(): ?Chauffeur
    {
        return $this->chauffeur;
    }

    public function setChauffeur(Chauffeur $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        // set the owning side of the relation if necessary
        if ($chauffeur->getIdEmp() !== $this) {
            $chauffeur->setIdEmp($this);
        }

        return $this;
    }
}