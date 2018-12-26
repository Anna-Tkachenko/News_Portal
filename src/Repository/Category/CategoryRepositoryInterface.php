<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository\Category;

interface CategoryRepositoryInterface
{
    public function findAllIsPublished();

    public function findCategoryBySlug(string $slug);
}
