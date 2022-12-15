<?php

namespace Magenest\AddToCart\Block;

use Magento\Framework\View\Element\Template;

class AddToCart extends Template
{
    protected $scopeConfig;
    public function __construct(
        Template\Context                $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array                           $data = []
    )
    {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
    }
    public function isEnable()
    {
        $isEnable = $this->scopeConfig->getValue(
            'config_add_to_cart/general/add_to_cart',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );
        if($isEnable==1){
            return true;
        }
        return false;
    }
}
