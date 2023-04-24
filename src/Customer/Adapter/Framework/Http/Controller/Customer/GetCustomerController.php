<?php

namespace Customer\Adapter\Framework\Http\Controller\Customer;

use Customer\Adapter\Framework\Http\DTO\GetCustomerRequestDTO;
use Customer\Application\UseCase\Customer\GetCustomer\DTO\GetCustomerInput;
use Customer\Application\UseCase\Customer\GetCustomer\GetCustomer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetCustomerController extends AbstractController
{
    public function __construct(private readonly GetCustomer $useCase)
    {
    }

    #[Route('/{id}', name: 'get_customer', methods: ['GET'])]
    public function __invoke(GetCustomerRequestDTO $requestDTO): Response
    {
        $responseDTO = $this->useCase->handle(GetCustomerInput::create($requestDTO->id));

        return new JsonResponse($responseDTO);

    }
}