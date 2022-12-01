<?php
namespace Magenest\Blog\Api;
interface BlogtoryInterface
{
    /**
     * Return a filtered product.
     *
     * @param int $id
     * @return \Dev\RestApi\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getItem(int $id);
    /**
     * Set descriptions for the products.
     *
     * @param \Dev\RestApi\Api\RequestItemInterface[] $products
     * @return void
     */
    public function setDescription(array $products);
}
