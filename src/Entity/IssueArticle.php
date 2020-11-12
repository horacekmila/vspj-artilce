<?php

namespace App\Entity;

use App\Repository\IssueArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IssueArticleRepository::class)
 */
class IssueArticle
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
    private $article_id;

    /**
     * @ORM\OneToOne(targetEntity=Issue::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $issue_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleId(): ?Article
    {
        return $this->article_id;
    }

    public function setArticleId(Article $article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }

    public function getIssueId(): ?Issue
    {
        return $this->issue_id;
    }

    public function setIssueId(Issue $issue_id): self
    {
        $this->issue_id = $issue_id;

        return $this;
    }
}
