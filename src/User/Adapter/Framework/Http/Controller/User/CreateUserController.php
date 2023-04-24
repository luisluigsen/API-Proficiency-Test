<?php

namespace User\Adapter\Framework\Http\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use User\Adapter\Framework\Http\DTO\CreateUserRequestDTO;
use User\Application\UseCase\User\CreateUser\CreateUser;
use User\Application\UseCase\User\CreateUser\DTO\CreateUserInput;

class CreateUserController extends AbstractController
{
    public function __construct(private readonly CreateUser $service)
    {
    }

    public function __invoke(Request $request,CreateUserRequestDTO $requestDTO): Response
    {
        $password = $request->request->get('password');
        $responseDTO = $this->service->handle(CreateUserInput::create(
            $requestDTO->name,
            $requestDTO->surname,
            $requestDTO->city,
            $requestDTO->category,
            $requestDTO->age,
            $requestDTO->email,
            $requestDTO->active,
        ), $password);
        return new JsonResponse(['userId'=> $responseDTO->id], Response::HTTP_CREATED);
    }
}