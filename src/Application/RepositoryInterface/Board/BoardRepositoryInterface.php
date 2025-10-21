<?php

namespace App\Application\RepositoryInterface\Board;

use App\Domain\Entity\Board\Board;

interface BoardRepositoryInterface
{
    public function save(Board $board):void;


}
