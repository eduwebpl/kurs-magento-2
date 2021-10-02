<?php
declare(strict_types=1);

namespace Eduweb\Brand\Controller\View;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;

class Index implements HttpGetActionInterface
{
    protected RequestInterface $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $code = $this->request->getParam('code');
        var_dump($code);
        exit;

        var_dump('Test');
        exit;
    }
}
