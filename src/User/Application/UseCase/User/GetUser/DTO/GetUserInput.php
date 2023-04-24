<?php

namespace User\Application\UseCase\User\GetUser\DTO;

class GetUserInput
{
    public function __construct(public readonly ?string $id)
    {
    }

    public static function create(?string $id): self
    {
        return new static($id);
    }
}