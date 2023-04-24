<?php

namespace Customer\Application\UseCase\Customer\UpdateCustomer\DTO;

class UpdateCustomerInput
{

    public function __construct(
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?string $email,
        public readonly ?string $password,
        public readonly ?array $roles,
        public readonly array $paramsToUpdate
    )
    {
    }

    public static function create(
        ?string $id,
        ?string $name,
        ?string $email,
        ?string $password,
        ?array $roles,
        array $paramsToUpdate
    ):self
    {
        return new static($id,$name,$email,$password,$roles,$paramsToUpdate);
    }
}