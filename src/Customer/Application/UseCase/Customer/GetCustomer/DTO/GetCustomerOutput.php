<?php

namespace Customer\Application\UseCase\Customer\GetCustomer\DTO;

use Customer\Domain\Model\Customer;

class GetCustomerOutput
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly array $roles,
    )
    {
    }

    public static function create(Customer $customer): self
    {
        return new self(
            $customer->id(),
            $customer->getName(),
            $customer->getEmail(),
            $customer->getPassword(),
            $customer->getRoles(),
        );
    }
}