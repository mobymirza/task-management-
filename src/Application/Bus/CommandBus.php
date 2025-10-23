<?php

namespace App\Application\Bus;

use App\Application\Command\CreateBoardCommand;
use App\Application\CommandHandller\CreateBoardHandller;

class CommandBus
{

    public function __construct(
        private readonly CreateBoardHandller $createBoardHandler,
    )
    {

    }

    public function dispatch(object $command)
    {
        if ($command instanceof CreateBoardCommand) {
            return ($this->createBoardHandler)($command);
        }
        throw new \RuntimeException('No handler for ' . get_class($command));
    }

}
