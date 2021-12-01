<?php declare(strict_types=1);

namespace MarkShust\MyModule\Observer;

use Magento\Framework\App\Request\Http;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\DesignInterface;

class SetThemeForMyroute implements ObserverInterface
{
    /** @var Http */
    private Http $request;

    /** @var DesignInterface  */
    private DesignInterface $design;

    public function __construct(
        Http $request,
        DesignInterface $design
    ) {
        $this->request = $request;
        $this->design = $design;
    }

    public function execute(Observer $observer): void
    {
        $pathInfo = $this->request->getPathInfo();

        if (substr($pathInfo, 0, 8) === '/myroute') {
            $this->design->setDesignTheme('Magento/luma');
        }
    }
}
