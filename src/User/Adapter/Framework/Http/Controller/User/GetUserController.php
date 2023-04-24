<?php

namespace User\Adapter\Framework\Http\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use User\Adapter\Framework\Http\DTO\GetUserRequestDTO;
use User\Application\UseCase\User\GetUser\GetUser;
use User\Application\UseCase\User\GetUser\DTO\GetUserInput;

class GetUserController extends AbstractController
{
    public function __construct(private readonly GetUser $useCase)
    {
    }

    public function __invoke(GetUserRequestDTO $request): Response
    {
        $responseDTO = $this->useCase->handle(GetUserInput::create($request->id));

        return new JsonResponse($responseDTO);
    }
}