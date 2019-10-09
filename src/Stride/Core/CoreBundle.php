<?php

namespace Stride\Core;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Stride\Core\DependencyInjection\CoreExtension;

class CoreBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new CoreExtension();
    }
}