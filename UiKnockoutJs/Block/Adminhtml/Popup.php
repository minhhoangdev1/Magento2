<?php

namespace Magenest\UiKnockoutJs\Block\Adminhtml;

use Magento\Framework\View\Element\Template;
use Magenest\UiKnockoutJs\Model\ResourceModel\Popup\CollectionFactory;

class Popup extends Template
{
    protected $customerSession;
    protected $customerGroupCollection;
    protected $popupCollectionFactory;
    private  $popup_title;
    private  $popup_content;
    private $isset=0;
    public function __construct(
        Template\Context                $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Model\Group   $customerGroupCollection,
        CollectionFactory               $popupCollectionFactory,
        array                           $data = []
    )
    {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->customerGroupCollection = $customerGroupCollection;
        $this->popupCollectionFactory=$popupCollectionFactory;
        $this->popup_title='';
        $this->popup_content='';
        $this->getPopuData();
    }

    private function getGroupId()
    {
        if ($this->customerSession->isLoggedIn()) {
            $customerGroupId = $this->customerSession->getCustomer()->getGroupId();
            return $customerGroupId;
//            $groupCollection = $this->customerGroupCollection->load($customerGroupId);
//            $groupCollection->getCustomerGroupCode();
        }
        return 0;
    }
    private function getPopuData(){
        $collection=$this->popupCollectionFactory->create();
        $data=$collection->addFieldToSelect(['title','content'])->addFieldToFilter('customer_group',['like'=>$this->getGroupId()])->getFirstItem();
        $this->popup_title=$data->getTitle();
        $this->popup_content=$data->getTitle();
        if($this->popup_title!=''){
            $this->isset=1;
        }
    }
    public function  getTitle(){
        return $this->popup_title;
    }
    public function  getContent(){
        return $this->popup_content;
    }
    public function getIsset(){
        return $this->isset;
    }
}
