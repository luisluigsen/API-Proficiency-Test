<?php

namespace Customer\Application\UseCase\Customer\UpdateCustomer\DTO;

use Customer\Domain\Model\Customer;

class UpdateCustomerOutput
{
    public function __construct(public readonly array $customerData)
    {
    }

    public static function createFromModel(Customer $customer):self
    {
        return new static([
            'id'=>$customer->id(),
            'name'=>$customer->getName(),
            'email'=>$customer->getEmail(),
            'password'=>$customer->getPassword(),
            'roles'=>$customer->getRoles()
        ]);
    }
}