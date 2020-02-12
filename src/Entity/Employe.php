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

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telEmp;

    /**
     * @ORM\Column(type="integer")
     */
    private $tempsTravail;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Role", inversedBy="employes")
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmp(): ?string
    {
        return $this->nomEmp;
    }

    public function setNomEmp(string $nomEmp): self
    {
        $this->nomEmp = $nomEmp;

        return $this;
    }

    public function getPrenomEmp(): ?string
    {
        return $this->prenomEmp;
    }

    public function setPrenomEmp(string $prenomEmp): self
    {
        $this->prenomEmp = $prenomEmp;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTelEmp(): ?string
    {
        return $this->telEmp;
    }

    public function setTelEmp(string $telEmp): self
    {
        $this->telEmp = $telEmp;

        return $this;
    }

    public function getTempsTravail(): ?int
    {
        return $this->tempsTravail;
    }

    public function setTempsTravail(int $tempsTravail): self
    {
        $this->tempsTravail = $tempsTravail;

        return $this;
    }

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
