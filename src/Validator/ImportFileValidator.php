<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-19
 * Time: 09:01
 */

namespace App\Validator;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImportFileValidator implements ValidatorInterface
{
    public function validate($value): void
    {
        if(!($value instanceof UploadedFile)) {
            throw new \RuntimeException('false type');
        }
        if($value->getSize() === 0) {
            throw new \RuntimeException('null size');
        }
    }
}
