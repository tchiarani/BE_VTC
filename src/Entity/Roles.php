<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
 */
class Roles
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=10)
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employe", mappedBy="NomRole", orphanRemoval=true)
     */
    private $employes;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->id;
    }

    public function setNom(string $nom): self
    {
        $this->id = $nom;

        return $this;
    }

    /**
     * @return Collection|Employe[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setNomRole($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
            // set the owning side to null (unless already changed)
            if ($employe->getNomRole() === $this) {
                $employe->setNomRole(null);
            }
        }

        return $this;
    }
}
