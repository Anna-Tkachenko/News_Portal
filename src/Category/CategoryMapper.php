<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Category;

use App\Dto\Category as CategoryDto;
use App\Entity\Category;

/**
 * Data mapper for category entity and DTO.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class CategoryMapper
{
    /**
     * Maps category entity to DTO.
     *
     * @param Category $entity Entity to map.
     *
     * @return CategoryDto Mapped new category DTO.
     */
    public function entityToDto(Category $entity): CategoryDto
    {
        return new CategoryDto(
            $entity->getName(),
            $entity->getDescription()
        );
    }
}
