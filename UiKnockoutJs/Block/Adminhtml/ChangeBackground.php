<?php

namespace Magenest\UiKnockoutJs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
class ChangeBackground extends Template
{

    public function __construct(
        \Magento\Framework\View\Element\Template\Context   $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array                                              $data = []
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function GetDataBackground()
    {
        $valueFromConfig = $this->scopeConfig->getValue(
            'config_background_color/general/config_background_color',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );

        return json_decode($valueFromConfig,true);
    }
}
