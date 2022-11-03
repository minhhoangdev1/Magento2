<?php
namespace Magenest\Movie\Block\Actor;
use Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
class Add extends Template
{
    public function getFormAction()
    {
        return $this->getUrl('movie/index/saveactor', ['_secure' => true]);
    }
}
