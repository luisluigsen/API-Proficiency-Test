<?php

namespace User\Adapter\Framework\Http\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use User\Adapter\Framework\Http\DTO\AdvancedSearchRequestDTO;
use User\Application\UseCase\User\AdvancedSearchUser\AdvancedSearch;
use User\Application\UseCase\User\AdvancedSearchUser\DTO\AdvancedSearchInput;

class AdvancedSearchController extends AbstractController
{

    public function __construct(private readonly AdvancedSearch $useCase)
    {
    }

    public function __invoke(AdvancedSearchRequestDTO $request): Response
    {

       $responseDTO = $this->useCase->handle(AdvancedSearchInput::create($request->filters));

       return new JsonResponse($responseDTO);
    }
}