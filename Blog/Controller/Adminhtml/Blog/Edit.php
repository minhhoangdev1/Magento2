<?php

namespace Magenest\Blog\Controller\Adminhtml\Blog;

use Magento\Framework\Controller\ResultFactory;

class Edit extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $blogFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Blog\Model\BlogFactory $blogFactory,
        \Magento\Framework\Registry $registry
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->blogFactory       = $blogFactory;
        $this->_coreRegistry     = $registry;
        parent::__construct($context);
    }
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Blog::blog');
        $resultPage->addBreadcrumb(__('Blog'), __('Blog'));
        return $resultPage;
    }
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit ') : __('New Blog'),
            $id ? __('Edit ') : __('New Blog')
        );

        $resultPage->getConfig()->getTitle()->prepend(__('Blog'));
        $resultPage->getConfig()->getTitle()->prepend($id ? __('Edit ') : __('New Blog'));

        return $resultPage;
    }
}
