<?php

namespace Customer\Domain\Model;

class Customer
{
    public function __construct(
        private readonly string $id,
        private string $name,
        private string $email,
        private int $phone,
        private readonly string $userId
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    public function userId(): string
    {
        return $this->userId;
    }
}
