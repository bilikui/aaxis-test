<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;
class FieldNotNullException extends AbstractRendereableException
{
    public function __construct($string)
    {
        parent::__construct("Some field are mandatory: $string");
    }

    public function renderJsonError() : JsonResponse
    {
        return parent::renderError($this->getMessage(), 500);
    }
}