<?php
namespace App\Repository\Interface;

interface INodeRepository
{
    /**
     * @return mixed
     */
    public function getAllNodes();

    /**
     * @param $id
     * @return mixed
     */
    public function getNodeById($id);

    /**
     * @param $collection
     * @return mixed
     */
    public function createNode($collection = [] );

    /**
     * @param $id
     * @param $collection
     * @return mixed
     */
    public function updateNode($id = null, $collection = [] );

    /**
     * @param $id
     * @return mixed
     */
    public function deleteNode($id);
}
