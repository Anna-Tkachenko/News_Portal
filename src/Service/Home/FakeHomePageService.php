<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/16/18
 * Time: 8:59 PM
 */

namespace App\Service\Home;

use App\Dto\Post;
use App\Post\PostsCollection;
/**
 * Fake home page service that generates test data.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class FakeHomePageService implements HomePageServiceInterface
{
    private const POSTS_COUNT = 4;
    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();
        for ($i = 0; $i < self::POSTS_COUNT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime
            );
            $dto->setImage($faker->imageUrl());
            $collection->addPost($dto);
        }
        return $collection;
    }
}