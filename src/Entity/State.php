<?php

namespace App\Entity;

use App\Repository\StateRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StateRepository::class)
 */
class State
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
     * @ORM\ManyToMany(targetEntity=StateGroup::class, inversedBy="previusStates")
     * @ORM\JoinTable("state_group", name="previous_states")
     */
    private $previousStateGroup;

    /**
     * @ORM\ManyToMany(targetEntity=StateGroup::class, inversedBy="nextStates")
     * @ORM\JoinTable("state_group", name="next_states")
     */
    private $nextStateGroup;


    public function __construct()
    {
        $this->previousStateGroup = new ArrayCollection();
        $this->nextStateGroup = new ArrayCollection();
    }

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

    /**
     * @return Collection|StateGroup[]
     */
    public function getPreviousStateGroup(): Collection
    {
        return $this->previousStateGroup;
    }

    public function addPreviousStateGroup(StateGroup $previousStateGroup): self
    {
        if (!$this->previousStateGroup->contains($previousStateGroup)) {
            $this->previousStateGroup[] = $previousStateGroup;
        }

        return $this;
    }

    public function removePreviousStateGroup(StateGroup $previousStateGroup): self
    {
        $this->previousStateGroup->removeElement($previousStateGroup);

        return $this;
    }

    /**
     * @return Collection|StateGroup[]
     */
    public function getNextStateGroup(): Collection
    {
        return $this->nextStateGroup;
    }

    public function addNextStateGroup(StateGroup $nextStateGroup): self
    {
        if (!$this->nextStateGroup->contains($nextStateGroup)) {
            $this->nextStateGroup[] = $nextStateGroup;
        }

        return $this;
    }

    public function removeNextStateGroup(StateGroup $nextStateGroup): self
    {
        $this->nextStateGroup->removeElement($nextStateGroup);

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
