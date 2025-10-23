<?php

namespace App\Tests\Unit\CommandHandler\Board;

use App\Application\Command\CreateBoardCommand;
use App\Application\CommandHandller\CreateBoardHandller;
use App\Application\RepositoryInterface\Board\BoardRepositoryInterface;
use App\Domain\Entity\Board\Board;
use App\Domain\ValueObject\Board\Description;
use App\Domain\ValueObject\Board\Name;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\Exception;

class CreateBoardHandlerTest extends TestCase
{
    private BoardRepositoryInterface $boardRepository;
    private CreateBoardHandller $sut;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->boardRepository = $this->createMock(BoardRepositoryInterface::class);
        $this->sut = new CreateBoardHandller($this->boardRepository);

    }

    public function test_invokes_and_saves_board_with_description(): void
    {
        // Arrange
        $command = new CreateBoardCommand('Project Alpha', 'Primary board');
        $description = new Description($command->description);
        $name = new Name($command->name);
        $board = new Board($name, $description);
        $this->boardRepository->expects($this->once())->method('save')
            ->with($board);

        //act
        $this->sut->__invoke($command);
        //assert
        $this->assertSame('Project Alpha', $board->getName()->toPrimitive());
        $this->assertSame('Primary board', $board->getDescription()->toPrimitive());
    }

    public function test_invokes_and_saves_board_without_description(): void
    {
        // Arrange
        $command = new CreateBoardCommand('Project Alpha', ' ');
        $description = new Description($command->description);
        $name = new Name($command->name);
        $board = new Board($name, $description);

        $this->boardRepository->expects($this->once())->method('save')
            ->with($board);

        //act
        $this->sut->__invoke($command);

        //assert
        $this->assertSame('Project Alpha', $board->getName()->toPrimitive());
        $this->assertSame(' ', $board->getDescription()->toPrimitive());

    }
}
