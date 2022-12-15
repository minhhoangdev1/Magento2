<?php

namespace Magenest\Movie\Block\Adminhtml\CustomButton\Edit\Form;

class ViewCustom extends \Magento\Backend\Block\Template
{

    public function __construct(
        \Magento\Backend\Block\Template\Context                          $context,
        \Magento\Framework\View\Model\PageLayout\Config\BuilderInterface $pageLayoutBuilder,
        \Magento\Framework\ObjectManagerInterface                        $objectManager,
        \Magento\Cms\Api\PageRepositoryInterface                         $pageRepositoryInterface,
        \Magento\Framework\Api\SearchCriteriaBuilder                     $searchCriteriaBuilder,
        array                                                            $data = []
    )
    {
        $this->_objectManager = $objectManager;
        $this->formKey = $context->getFormKey();
        $this->pageRepositoryInterface = $pageRepositoryInterface;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }
}
