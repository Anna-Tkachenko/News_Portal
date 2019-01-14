<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Post;

use App\Entity\Post;

interface PostRepositoryInterface
{
    /**
     * Finds all posts with related categories.
     *
     * @return mixed
     */
    public function findAllWithCategories();

    public function findAllIsPublished();

    public function findByCategory(string $categoryName);

    public function delete(int $id): void;

    public function save(Post $post): void;
}
