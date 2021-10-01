<?php
declare(strict_types=1);

namespace Eduweb\ModuleB\Rewrite;

use Magento\Cms\Controller\Index\Index;

class CmsControllerIndexB extends Index
{
    public function execute($coreRoute = null)
    {
        var_dump("MODULE B");
        return parent::execute($coreRoute);
    }
}
