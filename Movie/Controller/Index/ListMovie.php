<?php
namespace Magenest\Movie\Controller\Index;
class ListMovie extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
//        $movie = $this->_objectManager->create('Magenest\Movie\Model\Movie');
//        $data=$movie->load(2);
//        $response = $this->resultFactory
//            ->create(\Magento\Framework\Controller\ResultFactory::TYPE_JSON)
//            ->setData([
//                'name'=>$data->getName(),
//            ]);
//
//        return $response;

    }
}

