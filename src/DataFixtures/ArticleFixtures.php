<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker  =  Faker\Factory::create('fr_FR');
        $article = new Article();
        $article->setTitle('Framework PHP : Symfony 4 '.$faker->name);
        $article->setContent('Symfony 4, un framework sympa à connaitre !');

        $manager->persist($article);
        $article->setCategory($this->getReference('categorie_0'));
        $manager->flush();
    }


    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }

}


