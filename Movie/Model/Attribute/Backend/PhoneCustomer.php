<?php
namespace Magenest\Movie\Model\Attribute\Backend;

//use \PHPCuong\CustomerProfilePicture\Model\Source\Validation\Image;

class PhoneCustomer extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    public function beforeSave($object)
    {
//        $validation = new Image();
        $attrCode = $this->getAttribute()->getAttributeCode();
        if ($attrCode == 'phone') {
//            throw new \Magento\Framework\Exception\LocalizedException(
//                __('The phone is not valid .')
//            );
//            if ($validation->isImageValid('tmpp_name', $attrCode) === false) {
//                throw new \Magento\Framework\Exception\LocalizedException(
//                    __('The profile picture is not a valid image.')
//                );
//            }
        }

        return parent::beforeSave($object);
    }
}
