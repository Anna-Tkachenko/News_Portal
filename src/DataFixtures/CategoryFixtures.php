<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private const CATEGORIES = ['World',  'IT',  'Sport',  'Science'];

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        foreach (self::CATEGORIES as $key => $categoryName) {
            $category = new Category();
            $category
                ->setName($categoryName)
                ->setSlug(\strtolower($categoryName))
                ->setIsPublished($faker->boolean(80))
                ->setDescription($faker->text($faker->boolean ? 300 : 400));
            $manager->persist($category);

            $this->addReference(Category::class . '_' . $key, $category);
        }
        $manager->flush();
    }
}
