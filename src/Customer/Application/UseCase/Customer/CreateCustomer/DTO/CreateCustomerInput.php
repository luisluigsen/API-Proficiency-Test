<?php

namespace Customer\Application\UseCase\Customer\CreateCustomer\DTO;

class CreateCustomerInput
{
    private function __construct(
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly array $roles
    )
    {
    }

    public static function create(
        ?string $name,
        ?string $email,
        ?array $roles
    ):self
    {
        return new static(
            $name,
            $email,
            $roles
        );
    }
}