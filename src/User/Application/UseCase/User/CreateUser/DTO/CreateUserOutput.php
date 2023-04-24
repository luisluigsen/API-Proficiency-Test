<?php

namespace User\Application\UseCase\User\CreateUser\DTO;

class CreateUserOutput
{
    public function __construct(public readonly string $id)
    {
    }
}