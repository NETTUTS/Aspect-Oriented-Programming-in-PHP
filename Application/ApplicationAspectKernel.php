<?php

use Go\Core\AspectKernel;
use Go\Core\AspectContainer;

class ApplicationAspectKernel extends AspectKernel
{

    protected function getApplicationLoaderPath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
    }

    protected function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new BrokerAspect());
    }
}