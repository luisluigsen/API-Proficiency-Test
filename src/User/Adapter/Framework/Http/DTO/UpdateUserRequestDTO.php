<?php

namespace User\Adapter\Framework\Http\DTO;

use Symfony\Component\HttpFoundation\Request;

class UpdateUserRequestDTO implements RequestDTO
{
    public readonly ?string $id;
    public readonly ?string $name;
    public readonly ?string $surname;
    public readonly ?string $city;
    public readonly ?string $category;
    public readonly ?int $age;
    public readonly ?string $email;
    public readonly ?bool $active;
    public readonly ?string $password;
    public readonly array $keys;

    public function __construct(Request $request)
    {
        $this->id = $request->attributes->get('id');
        $this->name =$request->request->get('name');
        $this->surname = $request->request->get('surname');
        $this->city = $request->request->get('city');
        $this->category = $request->request->get('category');
        $this->age = $request->request->get('age');
        $this->email = $request->request->get('email');
        $this->active = $request->request->get('active');
        $this->password = $request->request->get('password');
        $this->keys = array_keys($request->request->all());
    }
}