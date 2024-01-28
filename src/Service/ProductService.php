<?php

namespace App\Service;

use App\Exception\Product\ProductDoesntExistsException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use App\Controller\Request\Product\ProductRequest;
use App\Exception\NoDataException;
use App\Exception\FieldNotNullException;
use App\Exception\Product\ProductExistsException;

class ProductService 
{
    public function __construct(private ProductRequest $payload, private EntityManagerInterface $em) 
    {
    }

    public function create(): JsonResponse
    { 
        try {

            $data = $this->em->getRepository(Product::class)->create($this->payload);
            
        } catch(ProductExistsException $productExistsException) {
            return $productExistsException->renderJsonError();
        } catch(NoDataException $noDataException) {
            return $noDataException->renderJsonError();
        } catch(FieldNotNullException $fieldNotNullException) {
            return $fieldNotNullException->renderJsonError();
        }

        return new JsonResponse([
            'status' => 'ok',
            'statusCode' => 200,
            'message' => 'The products have been inserted correctly.',
            'products' => $data
        ]);       
    }

    public function update(): JsonResponse
    { 
        try {
            
            $data = $this->em->getRepository(Product::class)->update($this->payload);
            
        } catch(ProductDoesntExistsException $productDoesntExistsException) {
            return $productDoesntExistsException->renderJsonError();
        } catch(NoDataException $noDataException) {
            return $noDataException->renderJsonError();
        } catch(FieldNotNullException $fieldNotNullException) {
            return $fieldNotNullException->renderJsonError();
        }

        return new JsonResponse([
            'status' => 'ok',
            'statusCode' => 200,
            'message' => 'The products have been updated correctly.',
            'products' => $data
        ]);       
    }
}