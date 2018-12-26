<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Fixtures for post entity.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class PostFixtures extends Fixture
{
    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $category = $this->getReference(Category::class . '_' . $faker->numberBetween(0, 3));
            $post
                ->setTitle($faker->sentence)
                ->setSlug($faker->slug)
                ->setBody($faker->text($faker->boolean ? 300 : 400))
                ->setCategory($category)
                ->setShortDescription($faker->text($faker->boolean ? 100 : 150))
                ->setPublicationDate($faker->boolean(70) ? $faker->dateTimeInInterval('-2 years', '+20 days') : null)
                ->setImage('default.png');
            ;
            $manager->persist($post);
        }
        $manager->flush();
    }
}
