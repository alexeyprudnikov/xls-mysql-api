<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-20
 * Time: 15:36
 */

namespace App\Utils;


interface EntityFactoryInterface
{
    public function create(array $data);
}