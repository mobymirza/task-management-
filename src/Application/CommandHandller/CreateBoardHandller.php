<?php

namespace App\Application\CommandHandller;

use App\Application\Command\CreateBoardCommand;
use App\Application\RepositoryInterface\Board\BoardRepositoryInterface;
use App\Domain\Entity\Board\Board;
use App\Domain\ValueObject\Board\Description;
use App\Domain\ValueObject\Board\Name;

class CreateBoardHandller
{

    public function __construct(private readonly BoardRepositoryInterface $boardRepository)
    {
    }

    public function __invoke(CreateBoardCommand $boardCommand): void
    {
        $description = $boardCommand->description === null ? null : new Description($boardCommand->description);;
        $name = new Name($boardCommand->name);

        $boardEntity = new Board($name, $description);

        $this->boardRepository->save($boardEntity);
    }

}
