<?php
/**
 * Created by PhpStorm.
 * User: tkachenko
 * Date: 1/14/19
 * Time: 3:05 PM
 */

namespace App\Api;

interface ApiMapperInterface
{
    public function entityToResource($entity);
}