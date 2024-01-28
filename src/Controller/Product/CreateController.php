<?php

namespace App\Controller\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use App\Exception\NoDataException;
use App\Exception\Product\ProductExistsException;
use App\Service\ProductService;

class CreateController extends AbstractController
{
    public function __invoke(ProductService $productService): JsonResponse
    {
        return $productService->create();
    }
}
