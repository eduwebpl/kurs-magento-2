<?php
declare(strict_types=1);

namespace Eduweb\DeployModes\Block;

use Magento\Framework\View\Element\Template;

class DeployModes extends Template
{
    public function _beforeToHtml()
    {
        throw new \Exception("Test message");
    }
}
