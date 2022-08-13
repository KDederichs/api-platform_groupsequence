<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

/**
 * This is a dummy entity. Remove it!
 */
#[ApiResource(mercure: true)]
#[ORM\Entity]
#[Assert\GroupSequenceProvider]
class Greeting implements GroupSequenceProviderInterface
{
    /**
     * The entity ID
     */
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private ?int $id = null;

    /**
     * A nice person
     */
    #[ORM\Column]
    #[Assert\NotBlank(groups: ['Greeting'])]
    public string $name = '';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupSequence(): array|GroupSequence
    {
        return  [
            'Greeting'
        ];
    }
}
