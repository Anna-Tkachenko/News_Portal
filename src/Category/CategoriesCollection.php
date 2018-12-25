<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/25/18
 * Time: 10:28 PM
 */

namespace App\Category;


final class CategoriesCollection implements \IteratorAggregate
{
    private $categories;

    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->categories);
    }
}