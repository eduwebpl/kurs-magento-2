<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Eduweb\Brand\Api\Data\BrandInterface;
use Eduweb\Brand\Model\Brand;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;

class Listing implements HttpGetActionInterface
{
    protected ResultFactory $resultFactory;
    protected \Eduweb\Brand\Model\ResourceModel\Brand\CollectionFactory $collectionFactory;

    public function __construct(
        ResultFactory $resultFactory,
        \Eduweb\Brand\Model\ResourceModel\Brand\CollectionFactory $collectionFactory
    ) {
        $this->resultFactory = $resultFactory;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
        /** @var  \Eduweb\Brand\Model\ResourceModel\Brand\Collection $collection */
        $collection = $this->collectionFactory->create();
        $collection->addFieldToSelect(['name', 'url_key']);

        $data = [];
        /** @var Brand $brand */
        foreach ($collection as $brand) {
            $data[] = $brand->getData(BrandInterface::NAME);
        }

        /** @var Json $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result->setData($data);

        return $result;
    }
}
