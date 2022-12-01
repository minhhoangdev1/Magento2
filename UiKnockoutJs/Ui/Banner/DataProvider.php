<?php

namespace Magenest\UiKnockoutJs\Ui\Banner;

use Magento\Ui\DataProvider\AbstractDataProvider;

use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends AbstractDataProvider
{
    protected $collection;
    protected $storeManager;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        $collectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->storeManager = $storeManager;
    }

    public function getData()
    {
        $result = [];
        foreach ($this->collection->getItems() as $item) {
            $result[$item->getId()]['general'] = $item->getData();
            if (isset($result[$item->getId()]['general']['image'])) {
                $result[$item->getId()]['general']['image'] = [
                    [
                        'name' => $result[$item->getId()]['general']['image'],
                        'url' => $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'banner/feature/'.$result[$item->getId()]['general']['image'],
                    ],
                ];
            } else {
                $result[$item->getId()]['general']['image'] = null;
            }
        }
        return $result;
    }
}
