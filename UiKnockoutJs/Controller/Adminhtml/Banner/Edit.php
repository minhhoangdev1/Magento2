<?php

namespace Magenest\UiKnockoutJs\Controller\Adminhtml\Banner;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $bannerFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\UiKnockoutJs\Model\BannerFactory $bannerFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->bannerFactory       = $bannerFactory;
        $this->_coreRegistry     = $registry;
        parent::__construct($context);
    }
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_UiKnockoutJs::banner');
        $resultPage->addBreadcrumb(__('Banner'), __('Banner'));
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit ') : __('New Banner'),
            $id ? __('Edit ') : __('New Banner')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Banner'));
        $resultPage->getConfig()->getTitle()->prepend($id ? __('Edit ') : __('New Banner'));

        return $resultPage;
    }
}
