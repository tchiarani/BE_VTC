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
     * @ORM\Column(type="string", length=10, name="Permis")
     */
    private $Permis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Inclus", mappedBy="PermisInclus", orphanRemoval=true)
     */
    private $incluses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Chauffeur", mappedBy="Permis", orphanRemoval=true)
     */
    private $chauffeurs;

    public function __construct()
    {
        $this->incluses = new ArrayCollection();
        $this->chauffeurs = new ArrayCollection();
    }

    public function getPermis(): ?string
    {
        return $this->Permis;
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
}
