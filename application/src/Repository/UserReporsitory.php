<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, User::class);
    }

    public function save(User $user): void
    {
    }
}
