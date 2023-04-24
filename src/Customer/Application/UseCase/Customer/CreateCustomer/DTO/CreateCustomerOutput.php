<?php

namespace Customer\Application\UseCase\Customer\CreateCustomer\DTO;

class CreateCustomerOutput
{
    public function __construct(public readonly string $id)
    {
    }
}