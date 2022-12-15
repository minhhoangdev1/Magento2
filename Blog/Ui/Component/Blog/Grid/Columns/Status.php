<?php

namespace Magenest\Blog\Ui\Component\Blog\Grid\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Status extends \Magento\Ui\Component\Listing\Columns\Column
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
                if($item['status']==1){
                    $status='<span class="grid-severity-notice"><span>Enable</span></span>';
                }else{
                    $status='<span class="grid-severity-critical"><span>Disable</span></span>';
                }
                $item['status'] = $status;
            }
        }
        return parent::prepareDataSource($dataSource);
    }
}
