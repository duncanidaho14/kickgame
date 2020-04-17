<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuxvideoRepository")
 * @ORM\Table(name="jeuxvideos")
 */
class Jeuxvideo
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
    private $titre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="jeuxvideos")
     */
    private $Categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Plateforme", inversedBy="jeuxvideos")
     */
    private $plateforme;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Event", inversedBy="jeuxvideos")
     */
    private $event;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_sortie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image", mappedBy="jeuxvideo")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Video", mappedBy="jeuxvideo")
     */
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="jeuxvideo")
     */
    private $commentaires;

    public function __construct()
    {
        $this->Categorie = new ArrayCollection();
        $this->event = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->Categorie;
    }

    public function addCategorie(categorie $categorie): self
    {
        if (!$this->Categorie->contains($categorie)) {
            $this->Categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): self
    {
        if ($this->Categorie->contains($categorie)) {
            $this->Categorie->removeElement($categorie);
        }

        return $this;
    }

    public function getPlateforme(): ?plateforme
    {
        return $this->plateforme;
    }

    public function setPlateforme(?plateforme $plateforme): self
    {
        $this->plateforme = $plateforme;

        return $this;
    }

    /**
     * @return Collection|event[]
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(event $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
        }

        return $this;
    }

    public function removeEvent(event $event): self
    {
        if ($this->event->contains($event)) {
            $this->event->removeElement($event);
        }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(\DateTimeInterface $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setJeuxvideo($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getJeuxvideo() === $this) {
                $image->setJeuxvideo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setJeuxvideo($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->contains($video)) {
            $this->videos->removeElement($video);
            // set the owning side to null (unless already changed)
            if ($video->getJeuxvideo() === $this) {
                $video->setJeuxvideo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setJeuxvideo($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getJeuxvideo() === $this) {
                $commentaire->setJeuxvideo(null);
            }
        }

        return $this;
    }
}
