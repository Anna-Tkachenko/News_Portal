<?php

/*
 * This file is part of the News-Portal project.
 * (c) Anna Tkachenko <tkachenko.anna835@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
