<?php
namespace Magenest\Movie\Block\Adminhtml;
class Actor extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Actor';
        $this->_controller = 'adminhtml_actor';
        $this->_addButtonLabel='New Actor';
        parent::_construct();
    }
}
