<?php
namespace Magenest\Blog\Model\Api;
use Magenest\Blog\Api\BlogRepositoryInterface;
use Magenest\Blog\Model\ResourceModel\Blog\CollectionFactory;
use Magenest\Blog\Model\BlogFactory;

/**
 * Class ProductRepository
 */
class BlogRepository implements BlogRepositoryInterface
{
    private $blogCollectionFactory;
    private $blogFactory;
    private $authSession;
    private $request;
    public function __construct(
        CollectionFactory $blogCollectionFactory,
        BlogFactory $blogFactory,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->blogCollectionFactory=$blogCollectionFactory;
        $this->blogFactory=$blogFactory;
        $this->authSession = $authSession;
        $this->request = $request;
    }

    public function getBlogs(){
        $collection=$this->blogCollectionFactory->create();
        $data=$collection->addFieldToSelect('*')->getData();
        $info[] = array('message' => 'GET Blog Successfully.', 'status'=> 'success','data'=>$data);
        return $info;
    }

    public function getItem(int $id)
    {
        $collection=$this->blogCollectionFactory->create();
        $data=$collection->addFieldToSelect('*')->addFieldToFilter('blog_id',['ep'=>$id])->getData();
        $info[] = array('message' => 'GET Blog Successfully.', 'status'=> 'success','data'=>$data);
        return $info;
    }

    public function deleteItem(int $id)
    {
        $model=$this->blogFactory->create();
        $model->load($id)->delete();
        $info[] = array('message' => 'Delete Blog Successfully.', 'status'=> 'success');
        return $info;
    }

    public function create()
    {
        $data = $this->request->getPostValue();
        $model=$this->blogFactory->create();
        $model->setData($data);
        $model->save();
        $info[] = array('message' => 'Create Blog Successfully.', 'status'=> 'success');
        return $info;
    }

    public function update(int $id)
    {
//        $data = $this->request->getParams();
//        $model=$this->blogFactory->create();
//        $model->load($id);
//        $model->setData($data);
//        $model->save();
        $info[] = array('message' => 'Update Blog Successfully.', 'status'=> 'success');
        return $info;
    }
}
