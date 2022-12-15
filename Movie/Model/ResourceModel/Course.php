<?php
namespace Magenest\Movie\Model\ResourceModel;
class Course extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    public function _construct() {
        $this->_init('magenest_course', 'course_id');
    }
}
