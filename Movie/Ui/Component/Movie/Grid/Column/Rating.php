<?php

namespace Magenest\Movie\Ui\Component\Movie\Grid\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class Rating extends \Magento\Ui\Component\Listing\Columns\Column
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
                $data = [];
                for ($i = 0; $i < 10; $i++) {
                    if ($i < $item['rating'])
                        $data[] = "<span style='color: rgb(245 228 5);font-size: 40px;'>★</span>";
                    else
                        $data[] = '<span style="color: rgb(204, 204, 204);font-size: 40px;">★</span>';
                }
                $item['rating'] = '';
                foreach ($data as $da) {
                    $item['rating'] = $item['rating'] . $da;
                }
            }
        }
        return parent::prepareDataSource($dataSource);
    }
}
