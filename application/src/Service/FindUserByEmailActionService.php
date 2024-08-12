<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;

class FindUserByEmailActionService
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function __invoke(string $email): ?User
    {
        return $this->userRepo->findOneBy(['email' => $email]);
    }
}
