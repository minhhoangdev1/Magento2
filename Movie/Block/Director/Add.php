<?php
namespace Magenest\Movie\Block\Director;
use Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
class Add extends Template
{
    public function getFormAction()
    {
        return $this->getUrl('movie/index/savedirector', ['_secure' => true]);
    }
}
