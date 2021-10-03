<?php
declare(strict_types=1);

namespace Eduweb\Brand\Api;

use Eduweb\Brand\Api\Data\BrandInterface;
use Eduweb\Brand\Api\Data\BrandSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface BrandRepositoryInterface
{
    public function save(BrandInterface $brand): BrandInterface;

    public function getById(int $id): BrandInterface;

    public function getList(SearchCriteriaInterface $searchCriteria): BrandSearchResultsInterface;

    public function getByUrlKey(string $urlKey): BrandInterface;
}
