<?php
namespace Magenest\Movie\Plugin\Checkout\Block;

class LayoutProcessorPlugin
{
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ): array
    {

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['vn_region_field'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'Magenest_Movie/vn_region_field',
                'elementTmpl' => 'ui/form/element/select',
                'options' => [],
                'id' => 'vn_region_field'
            ],
            'options'=>'',
            'dataScope' => 'shippingAddress.custom_attributes.vn_region_field',
            'label' => 'VN Region',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => [
                'required-entry' => true
            ],
            'sortOrder' => 250,
            /*'customEntry' => null,*/
            'id' => 'vn_region_field'
        ];
        return $jsLayout;
    }
}
