<?php

namespace User\Adapter\Framework\Http\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class HealthCheckController extends AbstractController
{
    public function __invoke(): Response
    {
        return new JsonResponse(['message' => 'Module User up and running!']);
    }
}
