<?php
namespace Magenest\Blog\Model\ResourceModel\Blog;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
    public function _construct() {
        $this->_init('Magenest\Blog\Model\Blog', 'Magenest\Blog\Model\ResourceModel\Blog');
    }
}
