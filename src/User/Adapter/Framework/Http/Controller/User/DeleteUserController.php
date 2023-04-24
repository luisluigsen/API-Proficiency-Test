<?php

namespace User\Adapter\Framework\Http\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use User\Adapter\Framework\Http\DTO\DeleteUserRequestDTO;
use User\Application\UseCase\User\DeleteUser\DeleteUser;
use User\Application\UseCase\User\DeleteUser\DTO\DeleteUserInput;

class DeleteUserController extends AbstractController
{
    public function __construct(private readonly DeleteUser $useCase)
    {
    }

    public function __invoke(DeleteUserRequestDTO $request): Response
    {
        $this->useCase->handle(DeleteUserInput::create($request->id));

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}