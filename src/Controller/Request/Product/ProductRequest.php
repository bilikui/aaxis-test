<?php

namespace App\Controller\Request\Product;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Request;
use App\Model\ProductModel;
use App\Controller\Request\RequestInterface;

class ProductRequest implements RequestInterface
{
    private Request $request;
    private $errors;
    private array $data = [];
    
    private ProductModel $product;
    public function __construct(private RequestStack $requestStack) 
    {
        $this->request = $this->requestStack->getCurrentRequest();
        $jsonContent = json_decode($this->request->getContent(), true);

        if ($jsonContent !== null) {
            $isOneRow = false;
        
            if (isset($jsonContent['sku']) || isset($jsonContent['name']) || isset($jsonContent['description'])) {
                $isOneRow = true;
            }
            
            $product = $this->setData($jsonContent);

            if ($isOneRow) {
                $this->data[] = $product;
            } else {
                foreach($jsonContent as $item) {
                    $this->data[] = $this->setData($item);
                }
            }    
        }
    }

    public function getData() : array
    {
        return $this->data;
    }

    public function setData(array $jsonContent = []) : ProductModel
    {   
        $product = new ProductModel();

        if (!empty($jsonContent)) {
            if (isset($jsonContent['sku'])) {
                $product->setSku($jsonContent['sku']);
            } else {
                $product->setSku(null);
            }
    
            if (isset($jsonContent['name'])) {
                $product->setName($jsonContent['name']);
            } else {
                $product->setName(null);
            }
    
            if (isset($jsonContent['description'])) {
                $product->setDescription($jsonContent['description']);
            } else {
                $product->setDescription(null);
            }
        }
    
        return $product;
    }
}