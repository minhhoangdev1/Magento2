<?php
namespace Magenest\UiKnockoutJs\Model\ResourceModel;
class Popup extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_popup', 'popup_id');
    }
}
