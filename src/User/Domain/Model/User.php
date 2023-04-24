<?php

namespace User\Domain\Model;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method string getUserIdentifier()
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    private string $password;

    private function __construct(
        private string $id,
        private string $name,
        private string $surname,
        private string $city,
        private string $category,
        private int $age,
        private string $email,
        private bool $active,
        private readonly \DateTime $createdAt,
        private \DateTime $updatedAt,
    ) {
    }

    public static function create(
        string $id,
        ?string $name,
        ?string $surname,
        ?string $city,
        ?string $category,
        int $age,
        ?string $email,
        ?bool $active,
        ?\DateTime $createdAt = null,
        ?\DateTime $updatedAt = null
    ): self
    {
        $createdAt = $createdAt ?: new \DateTime();
        $updatedAt = $updatedAt ?: new \DateTime();

        return new self($id, $name, $surname, $city, $category, $age, $email, $active, $createdAt, $updatedAt);
    }



    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function surname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function city(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function category(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function age(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function active(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    public function createdAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function updatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function markAsUpdated(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }


    public function getSalt()
    {
    }

    public function eraseCredentials()
    {
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function __call(string $name, array $arguments)
    {
    }
}
