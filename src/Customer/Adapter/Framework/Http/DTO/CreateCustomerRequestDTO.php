<?php

namespace Customer\Adapter\Framework\Http\DTO;

use Symfony\Component\HttpFoundation\Request;

class CreateCustomerRequestDTO implements RequestDTO
{
    public readonly ?string $name;
    public readonly ?string $email;
    public readonly ?string $password;
    public readonly ?array $roles;

    public function __construct(Request $request)
    {
        $this->name = $request->request->get('name');
        $this->email = $request->request->get('email');
        $this->password = $request->request->get('password');
        $this->roles = $request->request->get('roles');
    }
}