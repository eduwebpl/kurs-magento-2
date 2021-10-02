<?php
declare(strict_types=1);

namespace Eduweb\Brand\Model;

use Magento\Framework\Model\AbstractModel;

class Brand extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Eduweb\Brand\Model\ResourceModel\Brand::class);
    }
}
