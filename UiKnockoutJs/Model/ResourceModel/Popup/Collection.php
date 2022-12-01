<?php
namespace Magenest\UiKnockoutJs\Model\ResourceModel\Popup;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    public function _construct() {
        $this->_init('Magenest\UiKnockoutJs\Model\Popup', 'Magenest\UiKnockoutJs\Model\ResourceModel\Popup');
    }
}
