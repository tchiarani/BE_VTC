<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolesRepository")
 */
class Roles
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=10, name="NomRole")
     */
    private $NomRole;

    public function getNom(): ?int
    {
        return $this->NomRole;
    }

    public function setNom(string $nom): self
    {
        $this->NomRole = $nom;

        return $this;
    }
}
