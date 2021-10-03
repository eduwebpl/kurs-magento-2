<?php
declare(strict_types=1);

namespace Eduweb\Brand\ViewModel;

use Eduweb\Brand\Api\BrandRepositoryInterface;
use Eduweb\Brand\Model\Brand;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class View implements ArgumentInterface
{
    protected RequestInterface $request;

    protected BrandRepositoryInterface $brandRepository;

    public function __construct(RequestInterface $request, BrandRepositoryInterface $brandRepository )
    {
        $this->request = $request;
        $this->brandRepository = $brandRepository;
    }

    public function getBrandInfo()
    {
        $id = $this->request->getParam('id');
        $brandData = $this->brandRepository->getById((int)$id);

        return [
            'name' => $brandData->getName(),
            'collaborations' => [
                'Elon Musk',
                'Panasonic',
            ],
        ];
    }
}
