<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/16/18
 * Time: 9:53 PM
 */

namespace App\Service\Category;

use App\Dto\Post;
use App\Post\PostsCollection;
use Facebook\WebDriver\Remote\ExecuteMethod;

/**
 * Fake category page service that generates test data.
 *
 * @author Anna Tkachenko <tkachenko.anna835@gmail.com>
 */
final class FakeCategoryService implements CategoryPageServiceInterface
{
    private const POSTS_COUNT = 3;
    private $storage = [
        'it' => [
            'title' => 'IT news',
            'description' => 'Main IT news'
        ],
        'sport' => [
            'title' => 'Sport news',
            'description' => 'Main Sport news'
        ],
        'world' => [
            'title' => 'World news',
            'description' => 'Main World news'
        ],
        'science' => [
            'title' => 'Science news',
            'description' => 'Main Science news'
        ]
    ];
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

    public function getCategoryInfo($categoryName): array
    {
        if(isset($this->storage[$categoryName])){
            return $this->storage[$categoryName];
        } else {
            throw new \LogicException(sprintf('Category %s does not exist.', $categoryName));
        }
    }
}