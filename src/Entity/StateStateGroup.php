<?php

namespace App\Entity;

use App\Repository\StateStateGroupRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StateStateGroupRepository::class)
 */
class StateStateGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=StateGroup::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $state_group_id;

    /**
     * @ORM\OneToOne(targetEntity=State::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $state_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStateGroupId(): ?StateGroup
    {
        return $this->state_group_id;
    }

    public function setStateGroupId(StateGroup $state_group_id): self
    {
        $this->state_group_id = $state_group_id;

        return $this;
    }

    public function getStateId(): ?State
    {
        return $this->state_id;
    }

    public function setStateId(State $state_id): self
    {
        $this->state_id = $state_id;

        return $this;
    }
}
