<?php

namespace Magenest\DisableFrontPayment\Plugin\Model\Method;

use Magento\Checkout\Model\Session as CheckoutSession;
use function PHPUnit\Framework\exactly;

class MethodAvailable
{
    protected $checkoutSession;

    public function __construct(CheckoutSession $checkoutSession)
    {
        $this->checkoutSession = $checkoutSession;
    }

    public function afterGetAvailableMethods(\Magento\Payment\Model\MethodList $subject, $result)
    {
        foreach ($result as $key => $_result) {
            if ($_result->getCode() == "cashondelivery") {
                unset($result[$key]);
            }
        }
        return $result;
    }
}
