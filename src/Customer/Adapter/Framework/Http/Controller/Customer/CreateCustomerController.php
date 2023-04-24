<?php

namespace Customer\Adapter\Framework\Http\Controller\Customer;

use Customer\Adapter\Framework\Http\DTO\CreateCustomerRequestDTO;
use Customer\Application\UseCase\Customer\CreateCustomer\CreateCustomer;
use Customer\Application\UseCase\Customer\CreateCustomer\DTO\CreateCustomerInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateCustomerController extends AbstractController
{
    public function __construct(private readonly CreateCustomer $useCase)
    {
    }

    #[Route('', name: 'create_customer', methods: ['POST'])]
    public function __invoke(Request $request, CreateCustomerRequestDTO $requestDTO): Response
    {
        $password = $request->request->get('password');
        $responseDTO = $this->useCase->handle(CreateCustomerInput::create(
         $requestDTO->name,
         $requestDTO->email,
         $requestDTO->roles
        ), $password);
        return new JsonResponse(['customerId'=>$responseDTO->id], Response::HTTP_CREATED);
    }
}