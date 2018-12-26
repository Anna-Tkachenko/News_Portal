<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Post;

use App\Category\CategoryMapper;
use App\Dto\Post as PostDto;
use App\Entity\Post;

/**
 * Data mapper for post entity and DTO.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostMapper
{
    public function entityToDto(Post $entity): PostDto
    {
        $categoryMapper = new CategoryMapper();
        return new PostDto(
            $entity->getShortDescription(),
            $entity->getPublicationDate(),
            $entity->getImage(),
            $categoryMapper->entityToDto($entity->getCategory())
        );
    }
    public function dtoToEntity()
    {
        // TODO: implement
    }
}
