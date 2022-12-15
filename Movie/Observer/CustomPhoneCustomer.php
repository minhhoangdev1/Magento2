<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Customer;

class CustomPhoneCustomer implements ObserverInterface
{
    protected $_customerRepositoryInterface;
    protected $request;


    public function __construct(\Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface,
                                \Magento\Framework\App\RequestInterface $request)
    {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->request = $request;

    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $params = $this->request->getParams();
        $phone=$params['customer']['telephone'];
        $customer = $observer->getEvent()->getCustomer();
        $customerData = $customer->getDataModel();
        $customerData->setCustomAttribute('phone',$phone);
        $customer->updateData($customerData);
        return $this;
    }
}
