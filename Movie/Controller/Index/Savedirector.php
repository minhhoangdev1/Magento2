<?php
namespace Magenest\Movie\Controller\Index;
use function PHPUnit\Framework\isEmpty;

class Savedirector extends \Magento\Framework\App\Action\Action {
    public function execute() {
        $nameDirector=$this->getRequest()->getParam('nameDirector');
        if(!isEmpty($nameDirector)){
            $director=$this->_objectManager->create('Magenest\Movie\Model\Director');
            $director->setName($nameDirector);
            $director->save();
            return $this->_redirect('movie/index/index');
        }else{
            //return json type khi su dung ajax
            $response = $this->resultFactory
                ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
                ->setData([
                    'status'  => "error",
                    'message' => "Director Name is  a required field",
                ]);

            return $response;
        }





    }
}
