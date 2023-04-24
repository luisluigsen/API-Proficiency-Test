<?php

namespace Customer\Domain\Model;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method string getUserIdentifier()
 */
class Customer implements UserInterface, PasswordAuthenticatedUserInterface
{
    private string $password;

    public function __construct(
        private readonly string $id,
        private string $name,
        private string $email,
        private array $roles
    ) {
    }

    public static function create(
        string $id,
        ?string $name,
        ?string $email,
        array $roles
    ): self
    {
        return new self($id, $name, $email, $roles);
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

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
    public function getSalt()
    {
    }

    public function eraseCredentials()
    {
    }

    public function getUsername()
    {
    }

    public function __call(string $name, array $arguments)
    {
    }
}
