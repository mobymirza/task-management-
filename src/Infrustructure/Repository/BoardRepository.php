<?php

namespace App\Infrustructure\Repository;

use App\Application\RepositoryInterface\Board\BoardRepositoryInterface;
use App\Domain\Entity\Board\Board;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Board>
 */
class BoardRepository extends ServiceEntityRepository implements BoardRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Board::class);
    }

    public function save(Board $board):void
    {
        $this->getEntityManager()->persist($board);
        $this->getEntityManager()->flush();

    }
}
