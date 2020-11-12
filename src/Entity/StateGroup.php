<?php

namespace App\Entity;

use App\Repository\StateGroupRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StateGroupRepository::class)
 */
class StateGroup
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
    private $states;

    /**
     * @ORM\ManyToOne(targetEntity=State::class, inversedBy="next_state_group")
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStates(): ?string
    {
        return $this->states;
    }

    public function setStates(string $states): self
    {
        $this->states = $states;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }
}
