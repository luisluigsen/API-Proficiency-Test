<?php

namespace User\Application\UseCase\User\GetUser;

use User\Application\UseCase\User\GetUser\DTO\GetUserInput;
use User\Application\UseCase\User\GetUser\DTO\GetUserOutput;
use User\Domain\Repository\UserRepository;

class GetUser
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function handle(GetUserInput $input): GetUserOutput
    {
        return GetUserOutput::create($this->repository->findOneByIdOrFail($input->id));
    }
}