<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class AbstractRendereableException extends Exception
{
    abstract protected function renderJsonError(): JsonResponse;
    protected function renderError(string $message, int $statusCode): JsonResponse
    {
        return new JsonResponse([
            'status'        => false,
            'statusCode'    => $statusCode,
            'message'       => $message,
        ]);
    }
}