<?php
namespace Magenest\Movie\Model\ResourceModel\Course;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    public function _construct() {
        $this->_init('Magenest\Movie\Model\Course', 'Magenest\Movie\Model\ResourceModel\Course');
    }
}
