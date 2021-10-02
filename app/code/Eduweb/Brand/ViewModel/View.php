<?php
declare(strict_types=1);

namespace Eduweb\Brand\ViewModel;

use Eduweb\Brand\Model\Brand;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class View implements ArgumentInterface
{
    protected RequestInterface $request;

    protected \Eduweb\Brand\Model\BrandFactory $brandFactory;

    public function __construct(RequestInterface $request, \Eduweb\Brand\Model\BrandFactory $brandFactory)
    {
        $this->request = $request;
        $this->brandFactory = $brandFactory;
    }

    public function getBrandInfo()
    {
        $id = $this->request->getParam('id');
        /** @var Brand $brand */
        $brand = $this->brandFactory->create();
        $brand->load($id);
        
        return [
            'name' => $brand->getData('name'),
            'collaborations' => [
                'Elon Musk',
                'Panasonic',
            ],
        ];
    }
}
