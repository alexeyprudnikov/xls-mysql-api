<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-20
 * Time: 15:35
 */

namespace App\Utils;


use App\Entity\Category;

class CategoryFactory implements EntityFactoryInterface
{
    public function create(array $data): Category
    {
        $Category = new Category();
        $Category->setTitle($data['title']);
        $Category->setParent($data['parent']);
        return $Category;
    }
}