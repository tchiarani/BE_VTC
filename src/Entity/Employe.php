<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="App\Entity\Chauffeur", mappedBy="employe")
     */
    private $chauffeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Roles;

    public function __construct()
    {
        $this->chauffeur = new ArrayCollection();
    }

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

    /**
     * @return Collection|Chauffeur[]
     */
    public function getChauffeur(): Collection
    {
        return $this->chauffeur;
    }

    public function addChauffeur(Chauffeur $chauffeur): self
    {
        if (!$this->chauffeur->contains($chauffeur)) {
            $this->chauffeur[] = $chauffeur;
            $chauffeur->setEmploye($this);
        }

        return $this;
    }

    public function removeChauffeur(Chauffeur $chauffeur): self
    {
        if ($this->chauffeur->contains($chauffeur)) {
            $this->chauffeur->removeElement($chauffeur);
            // set the owning side to null (unless already changed)
            if ($chauffeur->getEmploye() === $this) {
                $chauffeur->setEmploye(null);
            }
        }

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->Roles;
    }

    public function setRoles(string $Roles): self
    {
        $this->Roles = $Roles;

        return $this;
    }
}