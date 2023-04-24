<?php

namespace User\Application\UseCase\User\AdvancedSearchUser\DTO;

class AdvancedSearchInput
{
    public function __construct(
        public readonly array $filters
    )
    {
    }

    public static function create(array $filters): self
    {
        return new static($filters);
    }
}