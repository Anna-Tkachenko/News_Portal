<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/25/18
 * Time: 10:33 PM
 */

namespace App\Repository\Category;


interface CategoryRepositoryInterface
{
    public function findAllIsPublished();

    public function findCategoryBySlug(string $slug);
}