<?php

namespace Magenest\Movie\Block\Adminhtml\Movie;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Add extends Template
{
    private $_directorFactory;

    public function __construct(Template\Context $context, \Magenest\Movie\Model\DirectorFactory $directorFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_directorFactory = $directorFactory;
    }
    public function getDirectors()
    {
        $collection = $this->_directorFactory->create()->getCollection();
        return $collection;
    }

    public function getFormAction()
    {
        return $this->getUrl('magenest/movie/save', ['_secure' => true]);
    }
}
