<?php

namespace App\Repository;

use App\Entity\EntityInterface;
use App\Controller\Request\RequestInterface;

interface RepositoryInterface
{
    public function list() : array ;

    public function create(RequestInterface $payload) : array;

    public function update(RequestInterface $payload) : array;

    public function toArray($entity): array;
}