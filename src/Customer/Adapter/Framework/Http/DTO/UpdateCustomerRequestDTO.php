<?php

namespace Customer\Adapter\Framework\Http\DTO;

use Symfony\Component\HttpFoundation\Request;

class UpdateCustomerRequestDTO implements RequestDTO
{

    public readonly ?string $id;
    public readonly ?string $name;
    public readonly ?string $email;
    public readonly ?string $password;
    public readonly ?array $roles;
    public readonly array $keys;

    public function __construct(Request $request)
    {
        $this->id = $request->attributes->get('id');
        $this->name = $request->request->get('name');
        $this->email = $request->request->get('email');
        $this->password = $request->request->get('password');
        $this->roles = $request->request->get('roles');
        $this->keys = array_keys($request->request->all());
    }
}