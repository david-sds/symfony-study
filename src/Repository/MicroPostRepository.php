<?php

namespace App\Repository;

use App\Entity\MicroPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MicroPost>
 */
class MicroPostRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        ManagerRegistry $registry,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct($registry, MicroPost::class);
        $this->entityManager = $entityManager;
    }

    public function findAllWithComments(): array
    {
        return $this->createQueryBuilder('p')
            ->addSelect('c')
            ->leftJoin('p.comments', 'c')
            ->orderBy('p. created', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function add(MicroPost $microPost, bool $flush = true): void
    {
        $this->entityManager->persist($microPost);
        if ($flush) {
            $this->entityManager->flush();
        }
    }

    public function remove(MicroPost $microPost, bool $flush = true): void
    {
        $this->entityManager->remove($microPost);
        if ($flush) {
            $this->entityManager->flush();
        }
    }
}
