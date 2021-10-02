<?php
declare(strict_types=1);

namespace Eduweb\Brand\Model\Repository;

use Eduweb\Brand\Api\BrandRepositoryInterface;
use Eduweb\Brand\Api\Data\BrandInterface;
use Eduweb\Brand\Model\ResourceModel\Brand;
use Magento\Framework\Exception\AlreadyExistsException;

class BrandRepository implements BrandRepositoryInterface
{
    protected \Eduweb\Brand\Model\BrandFactory $brandFactory;

    protected \Eduweb\Brand\Api\Data\BrandInterfaceFactory $brandInterfaceFactory;

    protected Brand $brandResourceModel;

    public function __construct(
        \Eduweb\Brand\Model\BrandFactory $brandFactory,
        \Eduweb\Brand\Api\Data\BrandInterfaceFactory $brandInterfaceFactory,
        Brand $brandResourceModel
    ) {
        $this->brandFactory = $brandFactory;
        $this->brandInterfaceFactory = $brandInterfaceFactory;
        $this->brandResourceModel = $brandResourceModel;
    }

    public function save(BrandInterface $brand): BrandInterface
    {
        $brandModel = $this->brandFactory->create();
        $brandModel->setData(BrandInterface::NAME, $brand->getName());
        $brandModel->setData(BrandInterface::URL_KEY, $brand->getUrlKey());

        try {
            $this->brandResourceModel->save($brandModel);
        } catch (\Exception $e) {

        }

        /** @var BrandInterface $brandData */
        $brandData = $this->brandInterfaceFactory->create();
        $brandData->setId($brandModel->getData(BrandInterface::ID));
        $brandData->setName($brandModel->getData(BrandInterface::NAME));
        $brandData->setUrlKey($brandModel->getData(BrandInterface::URL_KEY));

        return $brandData;
    }
}
