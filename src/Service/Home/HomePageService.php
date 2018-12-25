<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Home;

use App\Category\CategoriesCollection;
use App\Post\PostMapper;
use App\Post\PostsCollection;
use App\Repository\Category\CategoryRepositoryInterface;
use App\Repository\Post\PostRepositoryInterface;

final class HomePageService implements HomePageServiceInterface
{
    private $categoryRepository;
    private $postRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        PostRepositoryInterface $postRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }
    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        $posts = $this->postRepository->findAllWithCategories();
        $collection = new PostsCollection();
        $dataMapper = new PostMapper();
        foreach ($posts as $post) {
            $collection->addPost($dataMapper->entityToDto($post));
        }
        return $collection;
    }

    public function getCategories(): CategoriesCollection
    {
        $categories = $this->categoryRepository->findAllIsPublished();
        return new CategoriesCollection($categories);
    }
}

