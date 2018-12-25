<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/25/18
 * Time: 11:03 PM
 */

namespace App\Repository\Post;


interface PostRepositoryInterface
{
    /**
     * Finds all posts with related categories.
     *
     * @return mixed
     */
    public function findAllWithCategories();
}