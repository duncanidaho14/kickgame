<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 * @ORM\Table(name="categories")
 */
class Categorie
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
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jeuxvideo", mappedBy="Categorie")
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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

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
            $jeuxvideo->addCategorie($this);
        }

        return $this;
    }

    public function removeJeuxvideo(Jeuxvideo $jeuxvideo): self
    {
        if ($this->jeuxvideos->contains($jeuxvideo)) {
            $this->jeuxvideos->removeElement($jeuxvideo);
            $jeuxvideo->removeCategorie($this);
        }

        return $this;
    }
}
