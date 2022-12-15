<?php

namespace Magenest\Movie\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magenest\Movie\Model\CourseFactory;

class HandleSaveProduct implements ObserverInterface
{
    protected $request;
    protected $courseFactory;

    /**
     * HandleSaveProduct constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request,CourseFactory $courseFactory)
    {
        $this->request = $request;
        $this->courseFactory=$courseFactory;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $params = $this->request->getParams();
        $customFieldData = $params['magenest'];
        if( $customFieldData['myCheckbox']=="true"){
            $product = $observer->getEvent()->getProduct();
            foreach ($customFieldData['dynamic_rows'] as $item) {
                $model = $this->courseFactory->create();
                $model->setLink($item['link']);
                $model->setFromDate($customFieldData['from_date']);
                $model->setToDate($customFieldData['to_date']);
                $model->setEntityId($product->getId());
                $model->save();
            }
        }

    }
}
