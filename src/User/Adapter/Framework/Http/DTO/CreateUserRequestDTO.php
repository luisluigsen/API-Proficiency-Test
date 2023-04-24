<?php

namespace User\Adapter\Framework\Http\DTO;

use Symfony\Component\HttpFoundation\Request;

class CreateUserRequestDTO implements RequestDTO
{
    public readonly ?string $name;
    public readonly ?string $surname;
    public readonly ?string $city;
    public readonly ?string $category;
    public readonly int $age;
    public readonly ?string $email;
    public readonly ?bool $active;
    public readonly ?string $createdAt;
    public readonly ?string $updatedAt;
    public readonly ?string $password;

    public function __construct(Request $request)
    {
        $this->name = $request->request->get('name');
        $this->surname = $request->request->get('surname');
        $this->city = $request->request->get('city');
        $this->category = $request->request->get('category');
        $this->age = $request->request->get('age');
        $this->email = $request->request->get('email');
        $this->active = filter_var($request->request->get('active'), FILTER_VALIDATE_BOOLEAN) ?? null;
        $this->createdAt = $request->request->get('createdAt');
        $this->updatedAt = $request->request->get('updatedAt');
        $this->password = $request->request->get('password');
    }
}
