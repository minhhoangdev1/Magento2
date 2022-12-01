<?php

namespace Magenest\UiKnockoutJs\Controller\Adminhtml\Popup;

use Magenest\UiKnockoutJs\Model\PopupFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $popupFactory;
    protected $authSession;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        PopupFactory                        $popupFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
    )
    {
        parent::__construct($context);
        $this->popupFactory = $popupFactory;
        $this->authSession = $authSession;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue()['general'];
        $model = $this->popupFactory->create();

        if (isset($data['popup_id'])) {
            try {
                $id = $data['popup_id'];
                $model = $model->load($id);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        }
        $model->setData($data);
//        $model->setCustomerGroup(implode(',',$data['customer_group']));// using for multiselect
        $model->save();
        return $this->resultRedirectFactory->create()->setPath('magenest/popup/index');
    }

}
