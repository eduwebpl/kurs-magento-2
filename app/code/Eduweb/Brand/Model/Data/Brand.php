<?php
declare(strict_types=1);

namespace Eduweb\Brand\Model\Data;

use Eduweb\Brand\Api\Data\BrandInterface;
use Magento\Framework\DataObject;

class Brand extends DataObject implements BrandInterface
{

    public function getId(): int
    {
        return $this->getData(self::ID);
    }

    public function setId(int $id): void
    {
        $this->setData(self::ID, $id);
    }

    public function getName(): string
    {
        return $this->getData(self::NAME);
    }

    public function setName(string $name): void
    {
        $this->setData(self::NAME, $name);
    }

    public function getUrlKey(): string
    {
        return $this->getData(self::URL_KEY);
    }

    public function setUrlKey(string $urlKey): void
    {
        $this->setData(self::URL_KEY, $urlKey);
    }
}
