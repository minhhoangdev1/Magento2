<?php

namespace Magenest\Movie\Block\Adminhtml;

use Magento\Framework\View\Element\Template;

class ModuleList extends Template
{
    protected $fullModuleList;
    private $numberModuleMagentoCustomer = 0;
    private $numberModuleMagentoProdcut = 0;
    private $numberModuleOther = 0;

    public function __construct(
        Template\Context                         $context,
        \Magento\Framework\Module\FullModuleList $fullModuleList,
        array                                    $data = []
    )
    {
        parent::__construct($context, $data);
        $this->fullModuleList = $fullModuleList;
        $this->modulesList();
    }
    private function modulesList()
    {
        $allModules = $this->fullModuleList->getAll();
        foreach ($allModules as $module) {
            $arrName = explode('_', $module['name']);
            if ($arrName[0] != 'Magento') {
                $this->numberModuleOther++;
            } else {
                if (strpos($arrName[1], 'Customer')) {
                    $this->numberModuleMagentoCustomer++;
                } elseif (strpos($arrName[1], 'Product')) {
                    $this->numberModuleMagentoProdcut++;
                }
            }
        }
    }

    public function numberModuleMagentoCustomer()
    {
        return $this->numberModuleMagentoCustomer;
    }

    public function numberModuleMagentoProduct()
    {
        return $this->numberModuleMagentoProdcut;
    }

    public function numberModuleOther()
    {
        return $this->numberModuleOther;
    }
}
