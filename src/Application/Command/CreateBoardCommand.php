<?php

namespace App\Application\Command;

class CreateBoardCommand
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
    )
    {

    }
}
