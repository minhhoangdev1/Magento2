<?php
namespace Magenest\Movie\Controller\Index;
class SaveMovie extends \Magento\Framework\App\Action\Action {
    public function execute() {
        $name=$this->getRequest()->getParam('name');
        $description=$this->getRequest()->getParam('description');
        $rating=$this->getRequest()->getParam('rating');
        $director_id=$this->getRequest()->getParam('director_id');

        $movie = $this->_objectManager->create('Magenest\Movie\Model\Movie');
        $movie->setName($name);
        $movie->setDescription($description);
        $movie->setrating($rating);
        $movie->setDirectorId($director_id);
        $movie->save();
        return $this->_redirect('movie/index/listmovie');

//        $response = $this->resultFactory
//            ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
//            ->setData([
//                'name'=>$name,
//                'description'=>$description,
//                'rating'=>$rating,
//                '$director_id'=>$director_id,
//            ]);
//
//        return $response;
    }
}
