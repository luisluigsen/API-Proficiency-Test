<?php

namespace User\Domain\Repository;

use User\Domain\Model\User;

interface UserRepository
{
    public function findOneByIdOrFail(string $id): User;

    public function save(User $user):void;

    public function remove(User $user): void;

    public function search(array $filters): array;
}