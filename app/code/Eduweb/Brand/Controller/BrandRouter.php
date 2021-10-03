<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller;

use Eduweb\Brand\Api\BrandRepositoryInterface;
use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

class BrandRouter implements RouterInterface
{
    protected BrandRepositoryInterface $brandRepository;

    protected ActionFactory $actionFactory;

    public function __construct(BrandRepositoryInterface $brandRepository, ActionFactory $actionFactory)
    {
        $this->brandRepository = $brandRepository;
        $this->actionFactory = $actionFactory;
    }

    public function match(RequestInterface $request)
    {
        $urlKey = trim($request->getPathInfo(), '/');
        $brandData = $this->brandRepository->getByUrlKey($urlKey);

        if ($brandData->getId()) {
            $request->setModuleName('brand')
                ->setControllerName('view')
                ->setActionName('index')
                ->setParam('id', $brandData->getId());

            return $this->actionFactory->create(Forward::class);
        }

        return null;
    }
}
