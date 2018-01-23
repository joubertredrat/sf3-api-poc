<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Product;
use AppBundle\Entity\Store;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * DataFixture
 *
 * @package AppBundle\DataFixtures
 */
class DataFixture extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $store1 = new Store();
        $store1->setName('Padaria');
        $store1->setCreatedAt();

        for ($i = 1; $i < 6; $i++) {
            $product = new Product();
            $product->setStore($store1);
            $product->setName($store1->getName() . ' - produto ' . $i);
            $product->setCreatedAt();
            $product->setValue(mt_rand(100, 10000));
            $product->setStock(mt_rand(0, 200));
            if (mt_rand(0, 9) % 2 == 0) {
                $product->setUpdatedAt();
            }

            $store1->addProduct($product);
        }

        $manager->persist($store1);


        $store2 = new Store();
        $store2->setName('Mercado');
        $store2->setCreatedAt();

        for ($i = 1; $i < 17; $i++) {
            $product = new Product();
            $product->setStore($store2);
            $product->setName($store2->getName() . ' - item ' . $i);
            $product->setCreatedAt();
            $product->setValue(mt_rand(100, 10000));
            $product->setStock(mt_rand(0, 200));
            if (mt_rand(0, 9) % 2 == 0) {
                $product->setUpdatedAt();
            }

            $store2->addProduct($product);
        }

        $manager->persist($store2);

        $store3 = new Store();
        $store3->setName('Farmácia');
        $store3->setCreatedAt();
        $store3->setUpdatedAt();

        for ($i = 1; $i < 14; $i++) {
            $product = new Product();
            $product->setStore($store3);
            $product->setName($store3->getName() . ' - remédio ' . $i);
            $product->setCreatedAt();
            $product->setValue(mt_rand(100, 10000));
            $product->setStock(mt_rand(0, 200));
            if (mt_rand(0, 9) % 2 == 0) {
                $product->setUpdatedAt();
            }

            $store3->addProduct($product);
        }

        $manager->persist($store3);

        $manager->flush();
    }
}