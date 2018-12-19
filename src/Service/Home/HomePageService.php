<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/19/18
 * Time: 5:21 PM
 */

namespace App\Service\Home;

use App\Post\PostsCollection;

final class HomePageService implements HomePageServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getPosts(): PostsCollection
    {
        throw new \LogicException(__METHOD__ . ' not implemented');
    }
}