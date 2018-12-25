<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 12/25/18
 * Time: 10:37 PM
 */

namespace App\Dto;


/**
 * Data transfer object for Category entity.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
final class Category
{
    private $name;

    private $description;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}