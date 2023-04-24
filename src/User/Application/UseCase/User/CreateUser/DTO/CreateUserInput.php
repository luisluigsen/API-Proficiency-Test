<?php

namespace User\Application\UseCase\User\CreateUser\DTO;

class CreateUserInput
{
    private function __construct(
         public readonly ?string $name,
         public readonly ?string $surname,
         public readonly ?string $city,
         public readonly ?string $category,
         public readonly int $age,
         public readonly ?string $email,
         public readonly ?bool $active,
    )
    {
    }

    public static function create(
        ?string $name,
        ?string $surname,
        ?string $city,
        ?string $category,
        int $age,
        ?string $email,
        ?bool $active,
    ):self
    {
        return new static(
            $name,
            $surname,
            $city,
            $category,
            $age,
            $email,
            $active,
        );
    }
}