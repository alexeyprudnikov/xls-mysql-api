<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-18
 * Time: 16:18
 */

namespace App\Validator;


interface ValidatorInterface
{
    public function validate($value);
}