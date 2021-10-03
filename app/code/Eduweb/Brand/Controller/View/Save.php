<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Eduweb\Brand\Api\BrandRepositoryInterface;
use Eduweb\Brand\Api\Data\BrandInterface;
use Eduweb\Brand\Model\Brand;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;

class Save implements HttpGetActionInterface
{
    protected ResultFactory $resultFactory;

    protected \Eduweb\Brand\Api\Data\BrandInterfaceFactory $brandInterfaceFactory;

    protected BrandRepositoryInterface $brandRepository;

    public function __construct(
        ResultFactory $resultFactory,
        \Eduweb\Brand\Api\Data\BrandInterfaceFactory $brandInterfaceFactory,
        BrandRepositoryInterface $brandRepository
    ) {
        $this->resultFactory = $resultFactory;
        $this->brandInterfaceFactory = $brandInterfaceFactory;
        $this->brandRepository = $brandRepository;
    }

    public function execute()
    {
        /** @var BrandInterface $brandData */
        $brandData = $this->brandInterfaceFactory->create();
        $brandData->setName('Volvo');
        $brandData->setUrlKey('volvo');

        $brandData = $this->brandRepository->save($brandData);

        /** @var Json $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result->setData($brandData->getData());

        return $result;
    }
}
