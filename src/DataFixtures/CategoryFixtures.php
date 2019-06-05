<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use  Faker;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'PHP',
        'Java',
        'Javacript',
        'Ruby',
        'DevOps',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key =>$categoryName) {
            $faker  =  Faker\Factory::create('fr_FR');
            $category = new Category();
            $category->setName($categoryName . ' ' .$faker->name);
            $manager->persist($category);
            $this->addReference('categorie_' . $key, $category);
        }
        $manager->flush();
    }

}
