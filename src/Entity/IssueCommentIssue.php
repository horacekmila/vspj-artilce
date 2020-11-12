<?php

namespace App\Entity;

use App\Repository\IssueCommentIssueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IssueCommentIssueRepository::class)
 */
class IssueCommentIssue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=IssueComments::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $issue_comment;

    /**
     * @ORM\OneToOne(targetEntity=Issue::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $issue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIssueComment(): ?IssueComments
    {
        return $this->issue_comment;
    }

    public function setIssueComment(IssueComments $issue_comment): self
    {
        $this->issue_comment = $issue_comment;

        return $this;
    }

    public function getIssue(): ?Issue
    {
        return $this->issue;
    }

    public function setIssue(Issue $issue): self
    {
        $this->issue = $issue;

        return $this;
    }
}
