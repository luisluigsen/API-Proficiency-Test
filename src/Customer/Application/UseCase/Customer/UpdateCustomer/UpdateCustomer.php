<?php

namespace Customer\Application\UseCase\Customer\UpdateCustomer;

use Customer\Adapter\Security\PasswordHasherInterface;
use Customer\Application\UseCase\Customer\UpdateCustomer\DTO\UpdateCustomerInput;
use Customer\Application\UseCase\Customer\UpdateCustomer\DTO\UpdateCustomerOutput;
use Customer\Domain\Repository\CustomerRepository;

class UpdateCustomer
{
    private const SETTER_PREFIX = 'set';

    public function __construct(
        private readonly CustomerRepository $repository)
    {
    }

    public function handle(UpdateCustomerInput $input): UpdateCustomerOutput
    {
        $customer = $this->repository->findOneByIdOrFail($input->id);

        foreach ($input->paramsToUpdate as $param){
            $customer->{sprintf('%s%s', self::SETTER_PREFIX,ucfirst($param))}($input->{$param});
        }
        $this->repository->save($customer);

        return UpdateCustomerOutput::createFromModel($customer);
    }
}