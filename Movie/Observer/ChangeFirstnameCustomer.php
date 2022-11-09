<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;

class ChangeFirstnameCustomer implements ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $customer->setFirstname('Magenest');
        $customer->save();
        return $this;
    }
}
