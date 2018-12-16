<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/16/18
 * Time: 8:58 PM
 */

namespace App\Post;

use App\Dto\Post;
/**
 * Immutable collection of Post entities.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class PostsCollection implements \IteratorAggregate
{
    private $posts;
    public function __construct(Post ...$posts)
    {
        $this->posts = $posts;
    }
    public function addPost(Post $post): void
    {
        $this->posts[] = $post;
    }
    /**
     * {@inheritdoc}
     */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->posts);
    }
}