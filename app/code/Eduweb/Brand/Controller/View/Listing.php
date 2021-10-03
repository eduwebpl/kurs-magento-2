<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Eduweb\Brand\Api\BrandRepositoryInterface;
use Eduweb\Brand\Api\Data\BrandInterface;
use Eduweb\Brand\Model\Brand;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;

class Listing implements HttpGetActionInterface
{
    protected ResultFactory $resultFactory;
    protected BrandRepositoryInterface $brandRepository;
    protected SearchCriteriaBuilder $searchCriteriaBuilder;
    protected FilterBuilder $filterBuilder;

    public function __construct(
        ResultFactory $resultFactory,
        BrandRepositoryInterface $brandRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        FilterBuilder $filterBuilder
    ) {
        $this->resultFactory = $resultFactory;
        $this->brandRepository = $brandRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->filterBuilder = $filterBuilder;
    }

    public function execute()
    {
        $filter = $this->filterBuilder->setField('name')
            ->setValue('%te%')
            ->setConditionType('like')
            ->create();

        $filters = [$filter];
        $this->searchCriteriaBuilder->addFilters($filters);

        $searchCriteria = $this->searchCriteriaBuilder->create();

        $items = $this->brandRepository->getList($searchCriteria)->getItems();


        $data = [];
        foreach ($items as $brand) {
            $data[] = $brand->getName();
        }

        /** @var Json $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result->setData($data);

        return $result;
    }
}
