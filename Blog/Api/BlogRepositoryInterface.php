<?php
namespace Magenest\Blog\Api;
interface BlogRepositoryInterface
{
    /**
     * @return Array
     */
    public function getBlogs();

    /**
     * @return Array
     */
    public function getItem(int $id);

    /**
     * @return Array
     */
    public function deleteItem(int $id);

    /**
     * @return Array
     */
    public function create();
    /**
     * @return Array
     */
    public function update(int $id);
}
