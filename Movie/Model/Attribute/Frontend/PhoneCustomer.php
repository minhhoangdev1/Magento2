<?php

namespace Magenest\Movie\Model\Attribute\Frontend;

class PhoneCustomer extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    public function getValue($object)
    {
        $attrCode = $this->getAttribute()->getAttributeCode();
        if ($attrCode == 'phone') {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('The phone is not valid .')
            );

        }

        return parent::getValue($object);
    }
}
