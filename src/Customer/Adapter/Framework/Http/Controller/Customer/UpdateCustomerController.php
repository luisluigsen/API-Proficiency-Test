<?php

namespace Customer\Adapter\Framework\Http\Controller\Customer;

use Customer\Adapter\Framework\Http\DTO\UpdateCustomerRequestDTO;
use Customer\Application\UseCase\Customer\UpdateCustomer\DTO\UpdateCustomerInput;
use Customer\Application\UseCase\Customer\UpdateCustomer\UpdateCustomer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateCustomerController extends AbstractController
{
    public function __construct(private readonly UpdateCustomer $useCase)
    {
    }


    #[Route('/{id}', name: 'update_customer', methods: ['PATCH'])]
    public function __invoke(Request $request, UpdateCustomerRequestDTO $requestDTO): Response
    {
        $input = UpdateCustomerInput::create(
            $requestDTO->id,
            $requestDTO->name,
            $requestDTO->email,
            $requestDTO->password,
            $requestDTO->roles,
            $requestDTO->keys
        );

        $responseDTO= $this->useCase->handle($input);

        return new JsonResponse($responseDTO->customerData);
    }
}