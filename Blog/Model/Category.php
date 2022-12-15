<?php
namespace Magenest\Blog\Model;
class Category extends \Magento\Framework\Model\AbstractModel{
    public function _construct() {
        $this->_init('Magenest\Blog\Model\ResourceModel\Category');
    }
}

