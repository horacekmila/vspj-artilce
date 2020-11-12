<?php

namespace App\Entity;

use App\Repository\ArticleMagazineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleMagazineRepository::class)
 */
class ArticleMagazine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Article::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $arcitele_id;

    /**
     * @ORM\OneToOne(targetEntity=Magazine::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $magazine_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArciteleId(): ?Article
    {
        return $this->arcitele_id;
    }

    public function setArciteleId(Article $arcitele_id): self
    {
        $this->arcitele_id = $arcitele_id;

        return $this;
    }

    public function getMagazineId(): ?Magazine
    {
        return $this->magazine_id;
    }

    public function setMagazineId(Magazine $magazine_id): self
    {
        $this->magazine_id = $magazine_id;

        return $this;
    }
}
