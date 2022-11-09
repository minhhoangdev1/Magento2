<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

use Magenest\Movie\Model\MovieFactory;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    protected $movieFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        MovieFactory                        $movieFactory,

    )
    {
        parent::__construct($context);
        $this->movieFactory = $movieFactory;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getPostValue()['general'];

        $model = $this->movieFactory->create();

        if (isset($data['movie_id'])) {
            try {
                $id = $data['movie_id'];
                $model = $model->load($id);
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
        }
        $model->setData($data);
        $model->save();
        $parameters = [
            'movie'=>$model
        ];
        $this->_eventManager->dispatch('save_movie',$parameters);
        return $this->resultRedirectFactory->create()->setPath('magenest/movie/index');
    }
}
