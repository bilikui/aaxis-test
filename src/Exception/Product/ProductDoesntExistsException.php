<?php

namespace App\Exception\Product;

use App\Exception\AbstractRendereableException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductDoesntExistsException extends AbstractRendereableException
{
    public function __construct($sku)
    {
        parent::__construct("Product SKU $sku doesn't exists.");
    }

    public function renderJsonError() : JsonResponse
    {
        return parent::renderError($this->getMessage(), 404);
    }
}