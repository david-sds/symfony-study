<?php

namespace App\Repository;

use App\Entity\UserProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserProfile>
 */
class UserProfileRepository extends ServiceEntityRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(
        ManagerRegistry $registry,
    ) {
        parent::__construct($registry, UserProfile::class);
    }

    public function add(UserProfile $userProfile, bool $flush = true): void
    {
        $this->entityManager->persist($userProfile);
        if ($flush) {
            $this->entityManager->flush();
        }
    }

    public function remove(UserProfile $userProfile, bool $flush = true): void
    {
        $this->entityManager->remove($userProfile);
        if ($flush) {
            $this->entityManager->flush();
        }
    }
}
