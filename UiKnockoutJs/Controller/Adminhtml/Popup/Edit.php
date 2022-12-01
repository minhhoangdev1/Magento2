<?php

namespace Magenest\UiKnockoutJs\Controller\Adminhtml\Popup;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $popupFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\UiKnockoutJs\Model\PopupFactory $popupFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->popupFactory       = $popupFactory;
        $this->_coreRegistry     = $registry;
        parent::__construct($context);
    }
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_UiKnockoutJs::popup');
        $resultPage->addBreadcrumb(__('Popup'), __('Popup'));
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit ') : __('New Popup'),
            $id ? __('Edit ') : __('New Popup')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Popup'));
        $resultPage->getConfig()->getTitle()->prepend($id ? __('Edit ') : __('New Popup'));

        return $resultPage;
    }
}
