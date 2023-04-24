<?php

namespace User\Adapter\Framework\Http\DTO;

use Symfony\Component\HttpFoundation\Request;

class DeleteUserRequestDTO implements RequestDTO
{

    public readonly ?string $id;

    public function __construct(Request $request)
    {
        $this->id = $request->attributes->get('id');
    }
}