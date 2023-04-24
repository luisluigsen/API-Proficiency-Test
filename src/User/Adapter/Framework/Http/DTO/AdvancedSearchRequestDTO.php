<?php

namespace User\Adapter\Framework\Http\DTO;

use Symfony\Component\HttpFoundation\Request;

class AdvancedSearchRequestDTO implements RequestDTO
{
    public readonly array $filters;

    public function __construct(Request $request)
    {
        $this->filters = $request->request->get('filters') ?? [];

    }
}