<?php
declare(strict_types=1);

namespace Eduweb\DeployModes\Controller\Modes;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NotFoundException;

class Index implements HttpGetActionInterface
{
    protected ResultFactory $resultFactory;

    protected RequestInterface $request;

    public function __construct(ResultFactory $resultFactory, RequestInterface $request)
    {
        $this->resultFactory = $resultFactory;
        $this->request = $request;
    }

    /**
     * Execute action based on request and return result
     *
     * @return ResultInterface|ResponseInterface
     * @throws NotFoundException
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        return $resultPage;
    }
}
