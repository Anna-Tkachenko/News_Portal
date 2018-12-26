<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/25/18
 * Time: 10:56 PM
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