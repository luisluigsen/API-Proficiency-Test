<?php

namespace User\Application\UseCase\User\AdvancedSearchUser;

use User\Application\UseCase\User\AdvancedSearchUser\DTO\AdvancedSearchInput;
use User\Application\UseCase\User\AdvancedSearchUser\DTO\AdvancedSearchOutput;
use User\Domain\Repository\UserRepository;

class AdvancedSearch
{

    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function handle(AdvancedSearchInput $input): AdvancedSearchOutput
    {
        $users = $this->repository->search($input->filters);

        return AdvancedSearchOutput::fromUsers($users);
    }
}