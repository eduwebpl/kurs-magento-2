<?php
declare(strict_types=1);

namespace Eduweb\Brand\Model\ResourceModel\Brand;

use Eduweb\Brand\Model\Brand;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Brand::class, \Eduweb\Brand\Model\ResourceModel\Brand::class);
    }
}
