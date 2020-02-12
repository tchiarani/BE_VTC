<?php

namespace App\Entity;

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

    public function getPermis(): ?string
    {
        return $this->Permis;
    }

    public function setPermis(string $permis): self
    {
        $this->Permis = $permis;

        return $this;
    }
}
