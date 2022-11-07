<?php
namespace Magenest\Movie\Block\Adminhtml;
class Director extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Magenest_Director';
        $this->_controller = 'adminhtml_director';
        $this->_addButtonLabel='New Director';
        parent::_construct();
    }
}
