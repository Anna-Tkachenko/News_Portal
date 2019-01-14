<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/14/19
 * Time: 3:01 PM
 */

namespace App\Api;

final class ApiMapper implements ApiMapperInterface
{
    public function entityToResource($entity)
    {
        return [
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'body' => $post->getBody(),
        ];
    }
}