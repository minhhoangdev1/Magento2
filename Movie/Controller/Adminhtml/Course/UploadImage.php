<?php

namespace Magenest\Movie\Controller\Adminhtml\Course;

use Exception;
use Magenest\Movie\Model\ImageUploader;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;

class UploadImage extends Action implements HttpPostActionInterface
{
    protected $imageUploader;

    public function __construct(
        \Magento\Backend\App\Action\Context  $context,
        \Magento\Catalog\Model\ImageUploader $imageUploader
    )
    {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magenest_Movie::course');
    }

    public function execute()
    {
        try {
            $imageId = $this->_request->getParam('param_name','image');
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }

//    protected $imageUploader;
//    protected $request;
//    public function __construct(
//        Context $context,
//        ImageUploader $imageUploader,
//        \Magento\Framework\App\RequestInterface $request
//    ) {
//        parent::__construct($context);
//        $this->imageUploader = $imageUploader;
//        $this->request = $request;
//    }
//    public function execute()
//    {
//        $param=$this->request->getParams();
//        var_dump($param);
//        exit();
//        $imageId = $this->_request->getParam('param_name','');
//        //$imageId = $this->_request->getParam('image');
//
//        try {
//            $result = $this->imageUploader->saveFileToTmpDir($imageId);
//        } catch (Exception $e) {
//            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
//        }
//        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
//    }
}
