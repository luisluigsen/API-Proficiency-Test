<?php

namespace Customer\Application\UseCase\Customer\GetCustomer;

use Customer\Application\UseCase\Customer\GetCustomer\DTO\GetCustomerInput;
use Customer\Application\UseCase\Customer\GetCustomer\DTO\GetCustomerOutput;
use Customer\Domain\Repository\CustomerRepository;

class GetCustomer
{
    public function __construct(private readonly CustomerRepository $repository)
    {
    }

    public function handle(GetCustomerInput $input): GetCustomerOutput
    {
        return GetCustomerOutput::create($this->repository->findOneByIdOrFail($input->id));
    }
}