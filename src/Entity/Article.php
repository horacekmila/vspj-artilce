<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $docx_filename;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pdf_filename;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="integer")
     */
    private $version;

    /**
     * @ORM\Column(type="boolean")
     */
    private $editable;

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="article")
     */
    private $review_id;

    public function __construct()
    {
        $this->review_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDocxFilename(): ?string
    {
        return $this->docx_filename;
    }

    public function setDocxFilename(?string $docx_filename): self
    {
        $this->docx_filename = $docx_filename;

        return $this;
    }

    public function getPdfFilename(): ?string
    {
        return $this->pdf_filename;
    }

    public function setPdfFilename(?string $pdf_filename): self
    {
        $this->pdf_filename = $pdf_filename;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getEditable(): ?bool
    {
        return $this->editable;
    }

    public function setEditable(bool $editable): self
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviewId(): Collection
    {
        return $this->review_id;
    }

    public function addReviewId(Review $reviewId): self
    {
        if (!$this->review_id->contains($reviewId)) {
            $this->review_id[] = $reviewId;
            $reviewId->setArticle($this);
        }

        return $this;
    }

    public function removeReviewId(Review $reviewId): self
    {
        if ($this->review_id->removeElement($reviewId)) {
            // set the owning side to null (unless already changed)
            if ($reviewId->getArticle() === $this) {
                $reviewId->setArticle(null);
            }
        }

        return $this;
    }
}
