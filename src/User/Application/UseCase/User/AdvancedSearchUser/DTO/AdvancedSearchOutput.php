<?php

namespace User\Application\UseCase\User\AdvancedSearchUser\DTO;

class AdvancedSearchOutput
{
    public function __construct()
    {
    }

    public static function fromUsers(array $users): self
    {
        return new self($users);
    }
}