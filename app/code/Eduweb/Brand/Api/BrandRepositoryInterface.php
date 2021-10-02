<?php
declare(strict_types=1);

namespace Eduweb\Brand\Api;

use Eduweb\Brand\Api\Data\BrandInterface;

interface BrandRepositoryInterface
{
    public function save(BrandInterface $brand): BrandInterface;

    public function getById(int $id): BrandInterface;
}
