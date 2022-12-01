<?php
namespace Magenest\UiKnockoutJs\Model\ResourceModel\Banner;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    public function _construct() {
        $this->_init('Magenest\UiKnockoutJs\Model\Banner', 'Magenest\UiKnockoutJs\Model\ResourceModel\Banner');
    }
}
