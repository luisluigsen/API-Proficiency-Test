<?php

namespace Customer\Adapter\Framework\Http\Controller\Customer;

use Customer\Adapter\Framework\Http\DTO\DeleteCustomerRequestDTO;
use Customer\Application\UseCase\Customer\DeleteCustomer\DeleteCustomer;
use Customer\Application\UseCase\Customer\DeleteCustomer\DTO\DeleteCustomerInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeleteCustomerController extends AbstractController
{
    public function __construct(private readonly DeleteCustomer $useCase)
    {
    }

    #[Route('/{id}', name: 'delete_customer', methods: ['DELETE'])]
    public function __invoke(DeleteCustomerRequestDTO $requestDTO): Response
    {
        $this->useCase->handle(DeleteCustomerInput::create($requestDTO->id));
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);

    }
}