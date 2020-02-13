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
<<<<<<< HEAD
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEmp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomEmp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;
=======
     * @ORM\Column(type="integer", name="IdEmp")
     */
    private $idEmp;

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
>>>>>>> bdd

    /**
     * @ORM\Column(type="string", length=20)
     */
<<<<<<< HEAD
    private $telEmp;
=======
    private $TelEmp;
>>>>>>> bdd

    /**
     * @ORM\Column(type="integer")
     */
<<<<<<< HEAD
    private $tempsTravail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="employes")
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
=======
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
        return $this->idEmp;
>>>>>>> bdd
    }

    public function getNomEmp(): ?string
    {
<<<<<<< HEAD
        return $this->nomEmp;
    }

    public function setNomEmp(string $nomEmp): self
    {
        $this->nomEmp = $nomEmp;
=======
        return $this->NomEmp;
    }

    public function setNomEmp(string $NomEmp): self
    {
        $this->NomEmp = $NomEmp;
>>>>>>> bdd

        return $this;
    }

    public function getPrenomEmp(): ?string
    {
<<<<<<< HEAD
        return $this->prenomEmp;
    }

    public function setPrenomEmp(string $prenomEmp): self
    {
        $this->prenomEmp = $prenomEmp;
=======
        return $this->PrenomEmp;
    }

    public function setPrenomEmp(string $PrenomEmp): self
    {
        $this->PrenomEmp = $PrenomEmp;
>>>>>>> bdd

        return $this;
    }

<<<<<<< HEAD
    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
=======
    public function getLoginEmp(): ?string
    {
        return $this->LoginEmp;
    }

    public function setLoginEmp(string $LoginEmp): self
    {
        $this->LoginEmp = $LoginEmp;
>>>>>>> bdd

        return $this;
    }

<<<<<<< HEAD
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
=======
    public function getPasswordEmp(): ?string
    {
        return $this->PasswordEmp;
    }

    public function setPasswordEmp(string $PasswordEmp): self
    {
        $this->PasswordEmp = $PasswordEmp;
>>>>>>> bdd

        return $this;
    }

    public function getTelEmp(): ?string
    {
<<<<<<< HEAD
        return $this->telEmp;
    }

    public function setTelEmp(string $telEmp): self
    {
        $this->telEmp = $telEmp;
=======
        return $this->TelEmp;
    }

    public function setTelEmp(string $TelEmp): self
    {
        $this->TelEmp = $TelEmp;
>>>>>>> bdd

        return $this;
    }

<<<<<<< HEAD
    public function getTempsTravail(): ?int
    {
        return $this->tempsTravail;
    }

    public function setTempsTravail(int $tempsTravail): self
    {
        $this->tempsTravail = $tempsTravail;
=======
    public function getTempTravailEmp(): ?int
    {
        return $this->TempTravailEmp;
    }

    public function setTempTravailEmp(int $TempTravailEmp): self
    {
        $this->TempTravailEmp = $TempTravailEmp;
>>>>>>> bdd

        return $this;
    }

<<<<<<< HEAD
    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }
}
=======
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
>>>>>>> bdd
