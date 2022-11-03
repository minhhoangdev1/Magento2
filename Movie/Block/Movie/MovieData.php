<?php
namespace Magenest\Movie\Block\Movie;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use \Magenest\Movie\Model\ResourceModel\Director\Collection as DirectorCollectionFactory;

class MovieData extends Template
{
    private $_movieFactory;
    public function __construct(Template\Context $context, \Magenest\Movie\Model\MovieFactory $movieFactory, array $data = [])
    {
        parent::__construct($context, $data);
        $this->_movieFactory = $movieFactory;
    }

    public  function  getMovies(){
        $collection=$this->_movieFactory->create()->getCollection();

        $actorTable = $collection->getTable('magenest_actor');
        $actormovieTable = $collection->getTable('magenest_movie_actor');
        $directorTable = $collection->getTable('magenest_director');
        $data = $collection
            ->addFieldToSelect(['movie_id','description','rating'])
            ->addFieldToSelect('name','movie_name');
        $data->getSelect()
            ->joinLeft($directorTable, 'main_table.director_id='.$directorTable.'.director_id',['director_name' => 'name'])
            ->joinLeft($actormovieTable,'main_table.movie_id='.$actormovieTable.'.movie_id',null)
            ->joinLeft($actorTable,$actorTable.'.actor_id='.$actormovieTable.'.actor_id',['actor_name' => 'name']);
        return $data->getData();
    }

    //mot cach khac de lay collectionMovie
//    public function getMovies() {
//        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $collection=$objectManager->create('Magenest\Movie\Model\Movie')->getCollection();
//        return $collection;
//    }
    public function getActionToCreateMovie()
    {
        return $this->getUrl('movie', ['_secure' => true]);
    }

}
