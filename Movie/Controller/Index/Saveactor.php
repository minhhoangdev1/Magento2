<?php
namespace Magenest\Movie\Controller\Index;
class Saveactor extends \Magento\Framework\App\Action\Action {
    public function execute() {
        $nameActor=$this->getRequest()->getParam('nameActor');
        $director=$this->_objectManager->create('Magenest\Movie\Model\Actor');
        $director->setName($nameActor);
        $director->save();

        return $this->_redirect('movie');
    }
}
