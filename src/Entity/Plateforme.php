<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlateformeRepository")
 * @ORM\Table(name="plateformes")
 */
class Plateforme
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
    private $console;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Jeuxvideo", mappedBy="plateforme")
     */
    private $jeuxvideos;

    public function __construct()
    {
        $this->jeuxvideos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConsole(): ?string
    {
        return $this->console;
    }

    public function setConsole(string $console): self
    {
        $this->console = $console;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Jeuxvideo[]
     */
    public function getJeuxvideos(): Collection
    {
        return $this->jeuxvideos;
    }

    public function addJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        if (!$this->jeuxvideos->contains($jeuxvideo)) {
            $this->jeuxvideos[] = $jeuxvideo;
            $jeuxvideo->setPlateforme($this);
        }

        return $this;
    }

    public function removeJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        if ($this->jeuxvideos->contains($jeuxvideo)) {
            $this->jeuxvideos->removeElement($jeuxvideo);
            // set the owning side to null (unless already changed)
            if ($jeuxvideo->getPlateforme() === $this) {
                $jeuxvideo->setPlateforme(null);
            }
        }

        return $this;
    }
}
