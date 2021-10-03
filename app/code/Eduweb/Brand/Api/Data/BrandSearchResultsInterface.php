<?php
declare(strict_types=1);

namespace Eduweb\Brand\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BrandSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return BrandInterface[]
     */
    public function getItems();

    /**
     * @param array|BrandInterface[] $items
     * @return BrandSearchResultsInterface
     */
    public function setItems(array $items);
}
