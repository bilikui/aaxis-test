<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Exception\Product\ProductExistsException;
use App\Exception\Product\ProductDoesntExistsException;
use App\Controller\Request\RequestInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Exception\NoDataException;
use App\Exception\FieldNotNullException;

/**
 * @extends ServiceEntityRepository<Product>
 *
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository implements RepositoryInterface
{
    public function __construct(ManagerRegistry $registry, private ValidatorInterface $validator)
    {
        parent::__construct($registry, Product::class);
    }

    public function list(): array
    {
        $products = $this->findAll();
        foreach($products as $product) {
            $data[] = $this->toArray($product);
        }

        return $data;
    }

    public function create(RequestInterface $payload) : array
    {   
        if (empty($payload->getData())) {
            throw new NoDataException;
        }

        foreach($payload->getData() as $productModel) {
        
            $product = $this->findOneBySku($productModel->getSku());

            if ($product) {
                throw new ProductExistsException($productModel->getSku());
            }

            $product = new Product();
            $product
                ->setSku($productModel->getSku())
                ->setName($productModel->getName())
                ->setDescription($productModel->getDescription());
            
            $data[] = $this->toArray($product);

            $errors = $this->validator->validate($product);

            if (count($errors) > 0) {
                throw new FieldNotNullException($errors);
            }

            $this->_em->persist($product);
        }

        $this->_em->flush();

        return $data;
    }

    public function update(RequestInterface $payload) : array
    {   
        if (empty($payload->getData())) {
            throw new NoDataException;
        }

        foreach($payload->getData() as $productModel) {
        
            $product = $this->findOneBySku($productModel->getSku());

            if (!$product) {
                throw new ProductDoesntExistsException($productModel->getSku());
            }

            $product
                ->setName($productModel->getName())
                ->setDescription($productModel->getDescription());
            
            $data[] = $this->toArray($product);

            $errors = $this->validator->validate($product);

            if (count($errors) > 0) {
                throw new FieldNotNullException($errors);
            }

            $this->_em->persist($product);
        }

        $this->_em->flush();

        return $data;
    }

    public function toArray($entity): array
    {
        return [
            'sku' => $entity->getSku(),
            'name' => $entity->getName(),
            'description' => $entity->getDescription(),
            'createdAt' => $entity->getCreatedAt(),
            'updatedAt' => $entity->getUpdatedAt(),
        ];
    }
}
