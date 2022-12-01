<?php

namespace Magenest\UiKnockoutJs\Ui\Component\Banner\Grid\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Enable extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function __construct(
        ContextInterface   $context,
        UiComponentFactory $uiComponentFactory,
        array              $components = [],
        array              $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
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
                if($item['enable']==1){
                    $enable='<span class="grid-severity-notice"><span>True</span></span>';
                }else{
                    $enable='<span class="grid-severity-critical"><span>False</span></span>';
                }
                $item['enable'] = $enable;
            }
        }
        return parent::prepareDataSource($dataSource);
    }
}
