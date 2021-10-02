<?php
declare(strict_types=1);

namespace Eduweb\Brand\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class View implements ArgumentInterface
{
    public function getBrandInfo()
    {
        return [
            'code' => 'tesla',
            'name' => 'Tesla',
            'collaborations' => [
                'Elon Musk',
                'Panasonic',
            ],
        ];
    }
}
