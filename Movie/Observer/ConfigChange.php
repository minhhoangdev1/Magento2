<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;

class ConfigChange implements ObserverInterface
{
    private $request;
    private $configWriter;

    public function __construct(RequestInterface $request, WriterInterface $configWriter)
    {
        $this->request = $request;
        $this->configWriter = $configWriter;
    }

    public function execute(EventObserver $observer)
    {
        $salesforceParams = $this->request->getParam('groups');
        $textField = $salesforceParams['salesforcepage']['fields']['text_field']['value'];
        if ($textField == 'Ping') {
            $textField = 'Pong';
            $this->configWriter->save('salesforcecrm/salesforcepage/text_field', $textField);
        }
        return $this;
    }
}
