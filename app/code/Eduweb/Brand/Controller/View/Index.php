<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;

class Index implements HttpGetActionInterface
{
    protected RequestInterface $request;

    protected ResultFactory $resultFactory;

    public function __construct(RequestInterface $request, ResultFactory $resultFactory)
    {
        $this->request = $request;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        /** @var Page $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $result->addHandle('customer_account');

        return $result;
    }
}
