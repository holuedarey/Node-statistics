<?php
namespace App\Repository;

use App\Repository\Interface\INodeRepository;
use App\Models\Node;

class NodeRepository implements INodeRepository
{
    /**
     * @var null
     */
    protected $node = null;

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllNodes()
    {
        return Node::jsonPaginate();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getNodeById($id) : Mixed
    {
        return Node::find($id);
    }

    /**
     * @param $collection
     * @return bool
     */
    public function createNode($collection = [] ):Mixed
    {
        $node = new Node;
        $node->name = $collection['name'];
        $node->system_uptime = $collection['system_uptime'];
        $node->allocated_disk = $collection['allocated_disk'];
        $node->total_disk = $collection['total_disk'];
        $node->allocated_ram = $collection['allocated_ram'];
        $node->total_disk = $collection['total_disk'];
        return $node->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteNode($id) : Mixed
    {
        $node = Node::find($id);
        if($node){
            return Node::find($id)->delete();
        }
        else {
            return  null;
        }
    }

    public function updateNode($id = null, $collection = [])
    {
        $node = Node::find($id);
        if($node){
            $node->system_uptime = $collection['system_uptime'];
            $node->allocated_disk = $collection['allocated_disk'];
            $node->total_disk = $collection['total_disk'];
            $node->allocated_ram = $collection['allocated_ram'];
            $node->total_disk = $collection['total_disk'];
            $node->save();
        }

        return $node;
    }
}
