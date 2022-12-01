<?php

namespace Magenest\UiKnockoutJs\Ui\Component\Popup\Grid\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class CustomerGroup extends \Magento\Ui\Component\Listing\Columns\Column
{
    protected $customerGroupCollection;
    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        \Magento\Customer\Model\Group $customerGroupCollection,
        array              $components = [],
        array              $data = [],

    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->customerGroupCollection = $customerGroupCollection;
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $groupCollection = $this->customerGroupCollection->load($item['customer_group']);
                $name_customer_group=$groupCollection->getCustomerGroupCode();
                $item['customer_group'] = $name_customer_group;
            }
        }
        return parent::prepareDataSource($dataSource);
    }
}
