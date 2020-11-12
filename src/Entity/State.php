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
     * @ORM\OneToOne(targetEntity=StateGroup::class, cascade={"persist", "remove"})
     */
    private $previous_state;

    /**
     * @ORM\OneToMany(targetEntity=StateGroup::class, mappedBy="state")
     */
    private $next_state_group;

    public function __construct()
    {
        $this->next_state_group = new ArrayCollection();
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

    public function getPreviousState(): ?StateGroup
    {
        return $this->previous_state;
    }

    public function setPreviousState(?StateGroup $previous_state): self
    {
        $this->previous_state = $previous_state;

        return $this;
    }

    /**
     * @return Collection|StateGroup[]
     */
    public function getNextStateGroup(): Collection
    {
        return $this->next_state_group;
    }

    public function addNextStateGroup(StateGroup $nextStateGroup): self
    {
        if (!$this->next_state_group->contains($nextStateGroup)) {
            $this->next_state_group[] = $nextStateGroup;
            $nextStateGroup->setState($this);
        }

        return $this;
    }

    public function removeNextStateGroup(StateGroup $nextStateGroup): self
    {
        if ($this->next_state_group->removeElement($nextStateGroup)) {
            // set the owning side to null (unless already changed)
            if ($nextStateGroup->getState() === $this) {
                $nextStateGroup->setState(null);
            }
        }

        return $this;
    }
}
