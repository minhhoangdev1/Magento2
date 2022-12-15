<?php

namespace Magenest\Blog\Controller\Adminhtml\Blog;

use Magenest\Blog\Model\BlogFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $blogFactory;
    protected $authSession;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        BlogFactory                        $blogFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
    )
    {
        parent::__construct($context);
        $this->blogFactory = $blogFactory;
        $this->authSession = $authSession;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue()['general'];
        $model = $this->blogFactory->create();

        if (isset($data['blog_id'])) {
            try {
                $id = $data['blog_id'];
                $model = $model->load($id);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        }
        $model->setData($data);
        $model->setAuthorId($this->authSession->getUser()->getuserId());
        $parameters = [
            'blog'=>$model
        ];
        $this->_eventManager->dispatch('blog_save_before',$parameters);
        return $this->resultRedirectFactory->create()->setPath('magenest/blog/index');
    }

}
