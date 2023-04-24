<?php

namespace User\Adapter\Framework\Http\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use User\Adapter\Framework\Http\DTO\UpdateUserRequestDTO;
use User\Application\UseCase\User\UpdateUser\DTO\UpdateUserInput;
use User\Application\UseCase\User\UpdateUser\UpdateUser;

class UpdateUserController extends AbstractController
{
    public function __construct(private readonly UpdateUser $useCase)
    {
    }

    public function __invoke(UpdateUserRequestDTO $request): Response
    {
        $input = UpdateUserInput::create(
            $request->id,
            $request->name,
            $request->surname,
            $request->city,
            $request->category,
            $request->age,
            $request->email,
            $request->active,
            $request->password,
            $request->keys
        );

        $responseDTO = $this->useCase->handle($input);

        return new JsonResponse($responseDTO->userData);
    }

}