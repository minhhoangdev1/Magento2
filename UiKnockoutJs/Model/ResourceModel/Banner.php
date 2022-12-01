<?php
namespace Magenest\UiKnockoutJs\Model\ResourceModel;
class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_banner', 'banner_id');
    }
}
