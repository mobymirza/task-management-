<?php

namespace App\Domain\Entity\Board;

use App\Domain\ValueObject\Board\Description;
use App\Domain\ValueObject\Board\Name;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Board
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Embedded(class: Name::class, columnPrefix: false)]
    private Name $name;

    #[ORM\Embedded(class: Description::class, columnPrefix: false)]
    private ?Description $description = null;

    public function __construct(Name $name, Description $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getDescription(): ?Description
    {
        return $this->description;
    }

}
