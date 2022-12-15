<?php
namespace Magenest\Blog\Model\ResourceModel;
class Blog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_blog', 'blog_id');
    }
}
