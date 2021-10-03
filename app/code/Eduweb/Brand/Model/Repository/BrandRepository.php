<?php
declare(strict_types=1);

namespace Eduweb\Brand\Model\Repository;

use Eduweb\Brand\Api\BrandRepositoryInterface;
use Eduweb\Brand\Api\Data\BrandInterface;
use Eduweb\Brand\Api\Data\BrandSearchResultsInterface;
use Eduweb\Brand\Model\ResourceModel\Brand;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\SearchCriteriaInterface;

class BrandRepository implements BrandRepositoryInterface
{
    protected \Eduweb\Brand\Model\BrandFactory $brandFactory;

    protected \Eduweb\Brand\Api\Data\BrandInterfaceFactory $brandInterfaceFactory;

    protected Brand $brandResourceModel;
    protected Brand\CollectionFactory $collectionFactory;
    protected \Eduweb\Brand\Api\Data\BrandSearchResultsInterfaceFactory $brandSearchResultsInterfaceFactory;
    protected CollectionProcessor $collectionProcessor;

    public function __construct(
        \Eduweb\Brand\Model\BrandFactory $brandFactory,
        \Eduweb\Brand\Api\Data\BrandInterfaceFactory $brandInterfaceFactory,
        Brand $brandResourceModel,
        \Eduweb\Brand\Model\ResourceModel\Brand\CollectionFactory $collectionFactory,
        \Eduweb\Brand\Api\Data\BrandSearchResultsInterfaceFactory $brandSearchResultsInterfaceFactory,
        CollectionProcessor $collectionProcessor
    ) {
        $this->brandFactory = $brandFactory;
        $this->brandInterfaceFactory = $brandInterfaceFactory;
        $this->brandResourceModel = $brandResourceModel;
        $this->collectionFactory = $collectionFactory;
        $this->brandSearchResultsInterfaceFactory = $brandSearchResultsInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
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

        return $this->getObject($brandModel);
    }

    public function getById(int $id): BrandInterface
    {
        $brand = $this->brandFactory->create();
        $this->brandResourceModel->load($brand, $id);

        return $this->getObject($brand);
    }

    protected function getObject(\Eduweb\Brand\Model\Brand $brand): BrandInterface
    {
        /** @var BrandInterface $brandData */
        $brandData = $this->brandInterfaceFactory->create();
        $brandData->setId((int)$brand->getData(BrandInterface::ID));
        $brandData->setName($brand->getData(BrandInterface::NAME));
        $brandData->setUrlKey($brand->getData(BrandInterface::URL_KEY));

        return $brandData;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): BrandSearchResultsInterface
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $items = [];
        foreach ($collection as $brand) {
            $items[] = $this->getObject($brand);
        }

        /** @var BrandSearchResultsInterface $brandSearchResults */
        $brandSearchResults = $this->brandSearchResultsInterfaceFactory->create();
        $brandSearchResults->setItems($items);
        $brandSearchResults->setTotalCount($collection->getSize());
        $brandSearchResults->setSearchCriteria($searchCriteria);

        return $brandSearchResults;
    }

    public function getByUrlKey(string $urlKey): BrandInterface
    {
        $brand = $this->brandFactory->create();
        $this->brandResourceModel->load($brand, $urlKey, BrandInterface::URL_KEY);

        return $this->getObject($brand);
    }
}
