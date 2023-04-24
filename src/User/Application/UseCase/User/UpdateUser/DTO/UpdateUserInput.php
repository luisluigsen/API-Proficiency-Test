<?php

namespace User\Application\UseCase\User\UpdateUser\DTO;

class UpdateUserInput
{

    private function __construct(
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?string $surname,
        public readonly ?string $city,
        public readonly ?string $category,
        public readonly ?int $age,
        public readonly ?string $email,
        public readonly ?bool $active,
        public readonly ?string $password,
        public readonly array $paramsToUpdate
    )
    {
    }

    public static function create(
        ?string $id,
        ?string $name,
        ?string $surname,
        ?string $city,
        ?string $category,
        ?int $age,
        ?string $email,
        ?bool $active,
        ?string $password,
        array $paramsToUpdate
    ):self
    {
        return new static(
            $id,
            $name,
            $surname,
            $city,
            $category,
            $age,
            $email,
            $active,
            $password,
            $paramsToUpdate
        );
    }
}