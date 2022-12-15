<?php

namespace Magenest\Blog\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magenest\Blog\Model\ResourceModel\Blog\CollectionFactory;

class BlogSaveBefore implements ObserverInterface
{
    protected $blogCollectionFactory;
    protected $messageManager;

    public function __construct(
        CollectionFactory $blogCollectionFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
    )
    {
        $this->blogCollectionFactory = $blogCollectionFactory;
        $this->messageManager = $messageManager;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $blog = $observer->getEvent()->getBlog();
        $blogId = $blog->getBlogId();
        $url_rewrite = $blog->getUrlRewrite();
        $collection = $this->blogCollectionFactory->create();
        if (isset($blogId)) {
            $exist_url_rewrite = $collection->addFieldToSelect('url_rewrite')
                                            ->addFieldToFilter('blog_id', ['nin' => [$blogId]])
                                            ->addFieldToFilter('url_rewrite', $url_rewrite)
                                            ->getData();
        } else {
            $exist_url_rewrite = $collection->addFieldToSelect('url_rewrite')
                                            ->addFieldToFilter('url_rewrite', $url_rewrite)
                                            ->getData();
        }
        if (count($exist_url_rewrite) == 1) {
            $this->messageManager->addErrorMessage("Url Rewrite already exist !'");
        } else {
            $blog->save();
        }
        return $this;
    }
}
