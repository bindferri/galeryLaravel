<?php

namespace Api\Galery\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GaleryNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The image was not found.');
    }
}
