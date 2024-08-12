<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Messenger\Message\UserRegisteredMessage;
use Symfony\Component\Messenger\Exception\UnrecoverableMessageHandlingException;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserRegisteredMessageHandler implements MessageHandlerInterface
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function __invoke(UserRegisteredMessage $message): void
    {
        $user = new User($message->getName(), $message->getEmail());

        try {
            $this->userRepo->save($user);
        } catch (\Exception $e) {
            throw new UnrecoverableMessageHandlingException(\sprintf('User with email %s already exists', $message->getEmail()));
        }
    }
}
