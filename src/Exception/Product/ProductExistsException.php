<?php

namespace App\Exception\Product;

use App\Exception\AbstractRendereableException;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductExistsException extends AbstractRendereableException
{
    public function __construct($sku)
    {
        parent::__construct("Product SKU $sku already exists.");
    }

    public function renderJsonError() : JsonResponse
    {
        return parent::renderError($this->getMessage(), 500);
    }
}