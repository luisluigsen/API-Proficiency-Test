<?php

namespace User\Application\UseCase\User\DeleteUser;

use User\Application\UseCase\User\DeleteUser\DTO\DeleteUserInput;
use User\Domain\Repository\UserRepository;

class DeleteUser
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function handle(DeleteUserInput $input): void
    {
        $user = $this->repository->findOneByIdOrFail($input->id);

        $this->repository->remove($user);
    }
}