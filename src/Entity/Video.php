<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 * @ORM\Table(name="videos")
 */
class Video
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
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jeuxvideo", inversedBy="videos")
     */
    private $jeuxvideo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getJeuxvideo(): ?jeuxvideo
    {
        return $this->jeuxvideo;
    }

    public function setJeuxvideo(?jeuxvideo $jeuxvideo): self
    {
        $this->jeuxvideo = $jeuxvideo;

        return $this;
    }
}
