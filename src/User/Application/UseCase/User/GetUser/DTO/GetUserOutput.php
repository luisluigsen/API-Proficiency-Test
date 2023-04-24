<?php

namespace User\Application\UseCase\User\GetUser\DTO;

use User\Domain\Model\User;

class GetUserOutput
{

    private function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $surname,
        public readonly string $city,
        public readonly string $category,
        public readonly int $age,
        public readonly string $email,
        public readonly bool $active,
        public readonly \DateTime $createdAt,
        public readonly \DateTime $updatedAt
    )
    {
    }

    public static function create(User $user):self
    {
        return new self(
            $user->id(),
            $user->name(),
            $user->surname(),
            $user->city(),
            $user->category(),
            $user->age(),
            $user->email(),
            $user->active(),
            $user->createdAt(),
            $user->updatedAt()
        );
    }
}