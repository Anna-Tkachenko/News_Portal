<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/25/18
 * Time: 10:58 PM
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