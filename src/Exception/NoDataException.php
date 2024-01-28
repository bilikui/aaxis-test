<?php

namespace App\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;

class NoDataException extends AbstractRendereableException
{
    public function __construct()
    {
        parent::__construct("No data present in body request.");
    }

    public function renderJsonError() : JsonResponse
    {
        return parent::renderError($this->getMessage(), 500);
    }
}