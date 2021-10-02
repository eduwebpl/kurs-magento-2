<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\ResultFactory;

class Save implements HttpGetActionInterface
{
    protected ResultFactory $resultFactory;

    public function __construct(ResultFactory $resultFactory)
    {
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        /** @var Json $result */
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);

        return $result;
    }
}
