<?php
namespace Magenest\Movie\Model;
class Movie extends \Magento\Framework\Model\AbstractModel{
    public function _construct() {
        $this->_init('Magenest\Movie\Model\ResourceModel\Movie');
    }
}

