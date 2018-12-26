<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service\Category;

use App\Dto\Category;
use App\Post\PostsCollection;
use App\Category\CategoriesCollection;

/**
 * Interface of category page service that provides data for category page.
 *
 * @author Anna Tkachenko <tkachenko.anna835@gmail.com>
 */
interface CategoryPageServiceInterface
{
    /**
     * Gets category by provided category slug.
     *
     * @param string $slug
     *
     * @return Category
     */
    public function getCategoryBySlug(string $slug): Category;

    /**
     * Gets posts collection for provided category.
     *
     * @param Category $category
     *
     * @return PostsCollection
     */
    public function getPosts(Category $category): PostsCollection;

    public function getCategories(): CategoriesCollection;
}
