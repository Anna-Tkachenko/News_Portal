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
use App\Post\PostMapper;
use App\Category\CategoryMapper;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;
use App\Category\CategoriesCollection;

/**
 * Fake category page service that generates test data.
 *
 * @author Anna Tkachenko <tkachenko.anna835@gmail.com>
 */
final class CategoryService implements CategoryPageServiceInterface
{
    private $categoryRepository;
    private $postRepository;
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

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();
        return new CategoriesCollection($categories);
    }

    public function getCategoryBySlug(string $slug): Category
    {
        $category = $this->categoryRepository->findCategoryBySlug($slug);

        $dataMapper = new CategoryMapper();

        $currentCategory = $dataMapper->entityToDto($category);

        return $currentCategory;
    }

    /**
     * {@inheritdoc}
     */
    public function getPosts(Category $category): PostsCollection
    {
        $posts = $this->postRepository->findAllIsPublished();
        $collection = new PostsCollection();
        $dataMapper = new PostMapper();
        foreach ($posts as $post) {
            $newPost = $dataMapper->entityToDto($post);
            $postCategory = $newPost->getCategory();
            if($postCategory->getName() == $category->getName()){
                $collection->addPost($newPost);
            }
        }
        return $collection;
    }
}
