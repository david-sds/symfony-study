<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Comment>
 */
class CommentRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Comment::class);
        $this->entityManager =  $entityManager;
    }

    public function add(Comment $comment, bool $flush = true): void
    {
        $this->entityManager->persist($comment);
        if ($flush) {
            $this->entityManager->flush();
        }
    }

    public function remove(Comment $comment, bool $flush = true): void
    {
        $this->entityManager->remove($comment);
        if ($flush) {
            $this->entityManager->flush();
        }
    }
}
