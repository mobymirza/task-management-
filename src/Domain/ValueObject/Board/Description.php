<?php

namespace App\Domain\ValueObject\Board;

use Doctrine\ORM\Mapping as ORM;
use DomainException;

#[ORM\Embeddable]
class Description
{
    #[ORM\Column(name: 'description', type: 'string', length: 200)]
    private string $description;

    public function __construct(string $description)
    {
        if (strlen($description) > 200) {
            throw new DomainException('Description may not be greater than 200 characters.');
        }
        $this->description = $description;
    }

    public function toPrimitive(): string
    {
        return $this->description;
    }
}
