<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Category;

use App\Dto\Category;
use App\Dto\Post;
use App\Exception\EntityNotFoundException;
use App\Post\PostsCollection;
use Faker\Factory;

/**
 * Fake category page service that generates test data.
 *
 * @author Anna Tkachenko <tkachenko.anna835@gmail.com>
 */
final class FakeCategoryService implements CategoryPageServiceInterface
{
    private const POSTS_COUNT = 3;
    private const CATEGORIES = [
        'it' => [
            'name' => 'IT',
        ],
        'world' => [
            'name' => 'World',
        ],
        'science' => [
            'name' => 'science',
        ],
        'sport' => [
            'name' => 'Sport',
        ],
    ];

    public function getCategoryBySlug(string $slug): Category
    {
        if (!isset(self::CATEGORIES[$slug])) {
            throw new EntityNotFoundException(\sprintf('Category with slug "%s" not found', $slug));
        }
        $faker = Factory::create();
        $dto = new Category(self::CATEGORIES[$slug]['name'], $faker->sentence);
        return $dto;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosts(Category $category): PostsCollection
    {
        $faker = \Faker\Factory::create();
        $collection = new PostsCollection();
        for ($i = 0; $i < self::POSTS_COUNT; $i++) {
            $dto = new Post(
                $faker->text,
                $faker->dateTime,
                $category
            );
            $dto->setImage($faker->imageUrl());
            $collection->addPost($dto);
        }
        return $collection;
    }
}
