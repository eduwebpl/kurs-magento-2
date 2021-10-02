<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;

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
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
