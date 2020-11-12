<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Middlename;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Lastname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Updated_at;

    /**
     * @ORM\OneToMany(targetEntity=ContentPage::class, mappedBy="author")
     */
    private $contentPages;

    public function __construct()
    {
        $this->contentPages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getMiddlename(): ?string
    {
        return $this->Middlename;
    }

    public function setMiddlename(?string $Middlename): self
    {
        $this->Middlename = $Middlename;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeInterface $Created_at): self
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->Updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $Updated_at): self
    {
        $this->Updated_at = $Updated_at;

        return $this;
    }

    /**
     * @return Collection|ContentPage[]
     */
    public function getContentPages(): Collection
    {
        return $this->contentPages;
    }

    public function addContentPage(ContentPage $contentPage): self
    {
        if (!$this->contentPages->contains($contentPage)) {
            $this->contentPages[] = $contentPage;
            $contentPage->setAuthor($this);
        }

        return $this;
    }

    public function removeContentPage(ContentPage $contentPage): self
    {
        if ($this->contentPages->removeElement($contentPage)) {
            // set the owning side to null (unless already changed)
            if ($contentPage->getAuthor() === $this) {
                $contentPage->setAuthor(null);
            }
        }

        return $this;
    }
}
