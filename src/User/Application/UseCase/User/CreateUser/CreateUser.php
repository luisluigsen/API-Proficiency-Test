<?php

namespace User\Application\UseCase\User\CreateUser;

use User\Adapter\Security\PasswordHasherInterface;
use User\Application\UseCase\User\CreateUser\DTO\CreateUserInput;
use User\Application\UseCase\User\CreateUser\DTO\CreateUserOutput;
use User\Domain\Model\User;
use User\Domain\Repository\UserRepository;
use User\Domain\ValueObject\Uuid;

class CreateUser
{
    public function __construct(
        private readonly UserRepository $repository,
        private readonly PasswordHasherInterface $passwordHasher
    )
    {
    }

    public function handle(CreateUserInput $input, string $password): CreateUserOutput
    {
        $createdAt = new \DateTime();
        $updatedAt = new \DateTime();
        $user = User::create(
            Uuid::random()->value(),
            $input->name,
            $input->surname,
            $input->city,
            $input->category,
            $input->age,
            $input->email,
            $input->active,
            $createdAt,
            $updatedAt,
        );
        $password = $this->passwordHasher->hashPasswordForUser($user, $password);
        $user->setPassword($password);
        $this->repository->save($user);

        return new CreateUserOutput($user->id());
    }
}