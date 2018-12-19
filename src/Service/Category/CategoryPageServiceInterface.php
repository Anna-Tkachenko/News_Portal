<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/16/18
 * Time: 9:52 PM
 */

namespace App\Service\Category;

use App\Post\PostsCollection;
/**
 * Interface of category page service that provides data for category page.
 *
 * @author Anna Tkachenko <tkachenko.anna835@gmail.com>
 */
interface CategoryPageServiceInterface
{
    /**
     * Gets collection of posts for home page.
     *
     * @return PostsCollection
     */
    public function getPosts(): PostsCollection;

    public function getCategoryInfo($categoryName) :array;
}