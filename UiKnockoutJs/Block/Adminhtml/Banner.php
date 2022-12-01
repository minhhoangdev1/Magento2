<?php

namespace Magenest\UiKnockoutJs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magenest\UiKnockoutJs\Model\ResourceModel\Banner\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class Banner extends Template
{
    protected $bannerCollectionFactory;
    protected $storeManager;

    public function __construct(
        Template\Context  $context,
        CollectionFactory $bannerCollectionFactory,
        StoreManagerInterface $storeManager,
        array             $data = []
    )
    {
        parent::__construct($context, $data);
        $this->bannerCollectionFactory = $bannerCollectionFactory;
        $this->storeManager = $storeManager;
    }
    public function getBanners()
    {
        $collection = $this->bannerCollectionFactory->create();
        $data = $collection->addFieldToSelect('*')->addFieldToFilter('enable', ['eq' => '1']);
        $data->getSelect()->orderRand()->limit(2);
        return $data->getData();
    }
    public function storeManager(){
        return $this->storeManager;
    }
}
