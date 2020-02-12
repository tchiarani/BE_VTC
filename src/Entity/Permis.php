<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PermisRepository")
 */
class Permis
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=10)
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Inclus", mappedBy="PermisInclus", orphanRemoval=true)
     */
    private $incluses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chauffeur", mappedBy="Permis", orphanRemoval=true)
     */
    private $chauffeurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicule", mappedBy="PermisNecessaire", orphanRemoval=true)
     */
    private $vehicules;

    public function __construct()
    {
        $this->incluses = new ArrayCollection();
        $this->chauffeurs = new ArrayCollection();
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPermis(): ?string
    {
        return $this->id;
    }

    public function setPermis(string $permis): self
    {
        $this->Permis = $permis;

        return $this;
    }

    /**
     * @return Collection|Inclus[]
     */
    public function getIncluses(): Collection
    {
        return $this->incluses;
    }

    public function addInclus(Inclus $inclus): self
    {
        if (!$this->incluses->contains($inclus)) {
            $this->incluses[] = $inclus;
            $inclus->setPermisInclus($this);
        }

        return $this;
    }

    public function removeInclus(Inclus $inclus): self
    {
        if ($this->incluses->contains($inclus)) {
            $this->incluses->removeElement($inclus);
            // set the owning side to null (unless already changed)
            if ($inclus->getPermisInclus() === $this) {
                $inclus->setPermisInclus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Chauffeur[]
     */
    public function getChauffeurs(): Collection
    {
        return $this->chauffeurs;
    }

    public function addChauffeur(Chauffeur $chauffeur): self
    {
        if (!$this->chauffeurs->contains($chauffeur)) {
            $this->chauffeurs[] = $chauffeur;
            $chauffeur->setPermis($this);
        }

        return $this;
    }

    public function removeChauffeur(Chauffeur $chauffeur): self
    {
        if ($this->chauffeurs->contains($chauffeur)) {
            $this->chauffeurs->removeElement($chauffeur);
            // set the owning side to null (unless already changed)
            if ($chauffeur->getPermis() === $this) {
                $chauffeur->setPermis(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setPermisNecessaire($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->vehicules->contains($vehicule)) {
            $this->vehicules->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getPermisNecessaire() === $this) {
                $vehicule->setPermisNecessaire(null);
            }
        }

        return $this;
    }
}
