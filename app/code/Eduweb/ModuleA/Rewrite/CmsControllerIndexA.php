<?php
declare(strict_types=1);

namespace Eduweb\ModuleA\Rewrite;

use Magento\Cms\Controller\Index\Index;

class CmsControllerIndexA extends Index
{
    public function execute($coreRoute = null)
    {
        var_dump("MODULE A");
        return parent::execute($coreRoute);
    }
}
