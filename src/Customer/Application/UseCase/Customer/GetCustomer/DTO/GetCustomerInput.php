<?php

namespace Customer\Application\UseCase\Customer\GetCustomer\DTO;

class GetCustomerInput
{
    public function __construct(public readonly ?string $id)
    {
    }

    public static function create(?string $id): self
    {
        return new static($id);
    }
}