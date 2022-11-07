<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $movieFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Movie\Model\MovieFactory $movieFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->movieFactory       = $movieFactory;
        $this->_coreRegistry     = $registry;
        parent::__construct($context);
    }
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Movie::movie');
        $resultPage->addBreadcrumb(__('Movie'), __('Movie'));
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit ') : __('New Move'),
            $id ? __('Edit ') : __('New Movie')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Movie'));
        $resultPage->getConfig()->getTitle()->prepend($id ? __('Edit ') : __('New Movie'));

        return $resultPage;
    }
}
