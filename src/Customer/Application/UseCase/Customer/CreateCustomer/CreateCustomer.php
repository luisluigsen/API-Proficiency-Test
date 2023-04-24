<?php

namespace Customer\Application\UseCase\Customer\CreateCustomer;

use Customer\Adapter\Security\PasswordHasherInterface;
use Customer\Application\UseCase\Customer\CreateCustomer\DTO\CreateCustomerInput;
use Customer\Application\UseCase\Customer\CreateCustomer\DTO\CreateCustomerOutput;
use Customer\Domain\Model\Customer;
use Customer\Domain\Repository\CustomerRepository;
use Customer\Domain\ValueObject\Uuid;

class CreateCustomer
{
    public function __construct(
        private readonly PasswordHasherInterface $passwordHasher,
        private readonly CustomerRepository $repository
    )
    {
    }


    public function handle(CreateCustomerInput $input, string $password): CreateCustomerOutput
    {
        $customer = Customer::create(Uuid::random()->value(), $input->name, $input->email, $input->roles);

        $password = $this->passwordHasher->hashPasswordForUser($customer, $password);
        $customer->setPassword($password);
        $this->repository->save($customer);

        return new CreateCustomerOutput($customer->id());
    }
}