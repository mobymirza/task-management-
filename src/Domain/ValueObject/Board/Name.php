<?php

namespace App\Domain\ValueObject\Board;
use Doctrine\ORM\Mapping as ORM;
use DomainException;

#[ORM\Embeddable]
class Name
{
    #[ORM\Column(name: 'name', type: 'string', length: 50)]
    private string $name;

    public function __construct(string $name)
    {
        if (empty($name)) {
            throw new DomainException('Name is required.');
        }
        if (strlen($name) < 3) {
            throw new DomainException('Name must be at least 3 characters.');
        }

        if (strlen($name) > 50) {
            throw new DomainException('Name may not be greater than 50 characters.');
        }
        $this->name = $name;

    }

    public function toPrimitive(): string
    {
        return $this->name;
    }
}
