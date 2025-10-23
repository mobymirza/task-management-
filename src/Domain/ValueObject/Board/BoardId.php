<?php
namespace App\Domain\ValueObject\Board;
use Doctrine\ORM\Mapping\Embeddable;

#[Embeddable]
class BoardId
{

    public int $boardId;

    public function __construct(int $boardId)
    {
        $this->boardId = $boardId;
    }

}
