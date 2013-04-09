<?php

include __DIR__ . '/../vendor/lisachenko/go-aop-php/src/Go/Core/AspectKernel.php';
include 'ApplicationAspectKernel.php';

ApplicationAspectKernel::getInstance()->init(array(
    'autoload' => array(
        'Go'               => realpath(__DIR__ . '/../vendor/lisachenko/go-aop-php/src/'),
        'TokenReflection'  => realpath(__DIR__ . '/../vendor/andrewsville/php-token-reflection/'),
        'Doctrine\\Common' => realpath(__DIR__ . '/../vendor/doctrine/common/lib/')
    ),
    'appDir' => __DIR__ . '/../Application',
    'cacheDir' => null,
    'includePaths' => array(),
    'debug' => true
));
