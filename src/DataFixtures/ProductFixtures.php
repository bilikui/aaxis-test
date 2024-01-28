<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data[] = [
            'sku' => '0001',
            'name' => 'iPhone 9',
            'description' => 'An apple mobile which is nothing like apple'
        ];

        $data[] = [
            'sku' => '0002',
            'name' => 'iPhone X',
            'description' => 'SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...'
        ];

        $data[] = [
            'sku' => '0003',
            'name' => 'Samsung Universe 9',
            'description' => 'Samsung\'s new variant which goes beyond Galaxy to the Universe'
        ];

        $data[] = [
            'sku' => '0004',
            'name' => 'OPPOF19',
            'description' => 'OPPO F19 is officially announced on April 2021.'
        ];

        $data[] = [
            'sku' => '0005',
            'name' => 'Huawei P30',
            'description' => 'Huawei’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.'
        ];

        foreach($data as $item) {
            $product = new Product();
            $product
                ->setSku($item['sku'])
                ->setName($item['name'])
                ->setDescription($item['description']);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
