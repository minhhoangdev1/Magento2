<?php

namespace Magenest\UiKnockoutJs\Controller\Adminhtml\Banner;

use Magenest\UiKnockoutJs\Model\BannerFactory;
use Magento\Framework\Exception\LocalizedException;
use Magenest\UiKnockoutJs\Model\ImageUploader;

class Save extends \Magento\Backend\App\Action
{
    protected $bannerFactory;
    protected $authSession;
    protected $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        BannerFactory                       $bannerFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
        ImageUploader                       $imageUploader
    )
    {
        parent::__construct($context);
        $this->bannerFactory = $bannerFactory;
        $this->authSession = $authSession;
        $this->imageUploader = $imageUploader;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue()['general'];
        $model = $this->bannerFactory->create();

        if (isset($data['banner_id'])) {
            try {
                $id = $data['banner_id'];
                $model = $model->load($id);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        }
        if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
            $data['image'] = $data['image'][0]['name'];
            $this->imageUploader->moveFileFromTmp($data['image']);
        } elseif (isset($data['image'][0]['name']) && !isset($data['image'][0]['tmp_name'])) {
            $data['image'] = $data['image'][0]['name'];
        } else {
            $data['image'] = '';
        }
        $model->setData($data);
        $model->save();
        return $this->resultRedirectFactory->create()->setPath('magenest/banner/index');
    }

}
