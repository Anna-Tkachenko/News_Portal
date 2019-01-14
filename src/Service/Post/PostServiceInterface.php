<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/14/19
 * Time: 12:41 PM
 */

namespace App\Service\Post;

use App\Entity\Post;

interface PostServiceInterface
{
    public function findPost(int $id);

    public function delete(int $id): void;

    public function create(array $data);

    public function findAllPosts();

    public function update(int $id, array $data);
}