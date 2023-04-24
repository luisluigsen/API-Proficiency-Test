<?php

namespace Customer\Application\UseCase\Customer\DeleteCustomer;

use Customer\Application\UseCase\Customer\DeleteCustomer\DTO\DeleteCustomerInput;
use Customer\Domain\Repository\CustomerRepository;

class DeleteCustomer
{
    public function __construct(private readonly CustomerRepository $repository)
    {
    }

    public function handle(DeleteCustomerInput $input):void
    {
        $customer = $this->repository->findOneByIdOrFail($input->id);

        $this->repository->remove($customer);
    }
}