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
     * @ORM\Column(type="integer", name="IDEMP")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, name="NOMEMP")
     */
    private $nomEmp;

    /**
     * @ORM\Column(type="string", length=30, name="PRENOMEMP")
     */
    private $prenomEmp;

    /**
     * @ORM\Column(type="string", length=100, name="LOGINEMP")
     */
    private $loginEmp;

    /**
     * @ORM\Column(type="string", length=100, name="PASSWORDEMP")
     */
    private $passwordEmp;

    /**
     * @ORM\Column(type="string", length=20, name="TELEMP")
     */
    private $telEmp;

    /**
     * @ORM\Column(type="integer", name="TEMPTRAVAILEMP")
     */
    private $tempTravailEmp;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chauffeur", mappedBy="employe")
     */
    private $chauffeur;

    /**
     * @ORM\Column(type="string", length=255, name="ROLES")
     */
    private $roles;

    public function __construct()
    {
        $this->chauffeur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nomEmp;
    }

    public function setNom(string $nomEmp): self
    {
        $this->nomEmp = $nomEmp;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenomEmp;
    }

    public function setPrenom(string $prenomEmp): self
    {
        $this->prenomEmp = $prenomEmp;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->loginEmp;
    }

    public function setLogin(string $loginEmp): self
    {
        $this->loginEmp = $loginEmp;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->passwordEmp;
    }

    public function setPassword(string $passwordEmp): self
    {
        $this->passwordEmp = $passwordEmp;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->telEmp;
    }

    public function setTel(string $telEmp): self
    {
        $this->telEmp = $telEmp;

        return $this;
    }

    public function getTempTravail(): ?int
    {
        return $this->tempTravailEmp;
    }

    public function setTempTravail(int $tempTravailEmp): self
    {
        $this->tempTravailEmp = $tempTravailEmp;

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
            $chauffeur->setIdEmp($this);
        }

        return $this;
    }

    public function removeChauffeur(Chauffeur $chauffeur): self
    {
        if ($this->chauffeur->contains($chauffeur)) {
            $this->chauffeur->removeElement($chauffeur);
            // set the owning side to null (unless already changed)
            if ($chauffeur->getIdEmp() === $this) {
                $chauffeur->setIdEmp(null);
            }
        }

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}