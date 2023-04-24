<?php

namespace User\Application\UseCase\User\DeleteUser\DTO;

use User\Domain\Exception\InvalidArgumentException;

class DeleteUserInput
{
    private function __construct(public readonly string $id)
    {
    }

    public static function create(?string $id): self
    {
        if (is_null($id)){
            throw InvalidArgumentException::createFromMessage('User ID can\'t be null');
        }

        return new static($id);
    }
}