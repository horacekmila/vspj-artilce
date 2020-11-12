<?php

namespace App\Entity;

use App\Repository\ReviewCategoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReviewCategoryRepository::class)
 */
class ReviewCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $min_points;

    /**
     * @ORM\Column(type="integer")
     */
    private $max_points;

    /**
     * @ORM\ManyToOne(targetEntity=Review::class, inversedBy="category_id")
     */
    private $review;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMinPoints(): ?int
    {
        return $this->min_points;
    }

    public function setMinPoints(int $min_points): self
    {
        $this->min_points = $min_points;

        return $this;
    }

    public function getMaxPoints(): ?int
    {
        return $this->max_points;
    }

    public function setMaxPoints(int $max_points): self
    {
        $this->max_points = $max_points;

        return $this;
    }

    public function getReview(): ?Review
    {
        return $this->review;
    }

    public function setReview(?Review $review): self
    {
        $this->review = $review;

        return $this;
    }
}
