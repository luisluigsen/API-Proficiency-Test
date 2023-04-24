<?php

namespace User\Application\UseCase\User\UpdateUser;

use User\Application\UseCase\User\UpdateUser\DTO\UpdateUserInput;
use User\Application\UseCase\User\UpdateUser\DTO\UpdateUserOutput;
use User\Domain\Repository\UserRepository;

class UpdateUser
{
    private const SETTER_PREFIX = 'set';

    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function handle(UpdateUserInput $input): UpdateUserOutput
    {
        $user = $this->repository->findOneByIdOrFail($input->id);

        foreach ($input->paramsToUpdate as $param){
            $user->{sprintf('%s%s', self::SETTER_PREFIX,ucfirst($param))}($input->{$param});
        }

        $this->repository->save($user);

        return UpdateUserOutput::createFromModel($user);
    }
}