<?php
namespace Magenest\Movie\Block\Movie;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class AddData extends Template
{
    public function getDirectors() {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection=$objectManager->create('Magenest\Movie\Model\Director')->getCollection();
        return $collection;
    }

    public function getActors() {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection=$objectManager->create('Magenest\Movie\Model\Actor')->getCollection();
        return $collection;
    }
    public function getFormAction()
    {
        return $this->getUrl('movie/index/savemovie', ['_secure' => true]);
    }
}
