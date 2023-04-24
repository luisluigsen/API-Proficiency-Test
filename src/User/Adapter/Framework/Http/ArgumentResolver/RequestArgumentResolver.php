<?php

namespace User\Adapter\Framework\Http\ArgumentResolver;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use User\Adapter\Framework\Http\DTO\RequestDTO;
use User\Adapter\Framework\Http\RequestTransformer\RequestTransformer;

class RequestArgumentResolver implements ArgumentValueResolverInterface
{

    public function __construct(private readonly RequestTransformer $requestTransformer)
    {
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        if (null === $argument->getType()){
            return false;
        }

        return (new \ReflectionClass($argument->getType()))->implementsInterface(RequestDTO::class);
    }

    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        $this->requestTransformer->transform($request);

        $class = $argument->getType();

        yield new $class($request);
    }
}