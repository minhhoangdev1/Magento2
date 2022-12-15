<?php
namespace Magenest\Blog\Model\ResourceModel;
class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_category', 'category_id');
    }
}
