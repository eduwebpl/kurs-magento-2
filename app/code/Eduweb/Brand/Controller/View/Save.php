<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Eduweb\Brand\Model\Brand;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;

class Save implements HttpGetActionInterface
{
    protected ResultFactory $resultFactory;

    protected \Eduweb\Brand\Model\BrandFactory $brandFactory;

    public function __construct(ResultFactory $resultFactory, \Eduweb\Brand\Model\BrandFactory $brandFactory)
    {
        $this->resultFactory = $resultFactory;
        $this->brandFactory = $brandFactory;
    }

    public function execute()
    {
        /** @var Brand $brand */
        $brand = $this->brandFactory->create();
        $brand->setData('name', 'Tesla');
        $brand->setData('url_key', 'tesla');
        $brand->save();

        /** @var Json $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result->setData($brand->getData());

        return $result;
    }
}
