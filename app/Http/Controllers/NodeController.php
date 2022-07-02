<?php

namespace App\Http\Controllers;

use App\Http\Requests\NodesRequest;
use App\Repository\Interface\INodeRepository;
use App\Repository\NodeRepository;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class NodeController extends Controller
{
    public $node;

    public function __construct(NodeRepository $node)
    {
        $this->node = $node;
    }

    public function ViewAllNode()
    {
        $nodes = $this->node->getAllNodes();
        return response()->json(['data' => $nodes ], 200);
    }


    public function viewNode($id)
    {
        $node = $this->node->getNodeById($id);
        return response()->json(['data' => $node ], 200);
    }

    public function createNode(NodesRequest $request)
    {
        $collection = $request->safe()->except(['_token','_method']);
        $node = $this->node->createNode($collection);
        return response()->json(['message' => 'Node Created successfully' ], 201);

    }

    public function updateNode(Request $request, $id = null)
    {
        $collection = $request->except(['_token','_method']);
        $node = $this->node->updateNode($id, $collection);
        $response = "";
        if($node === null){
            $response = "Node can not be found";
        }else{
            $response = "Node updated successufully";
        }
        return response()->json(['data' => $response ], 200);

    }

    public function deleteNode($id)
    {
        $node = $this->node->deleteNode($id);
        $response = "";
        if($node === null){
            $response = "Node can not be found";
        }else{
            $response = "Node updated successufully";
        }
        return response()->json(['message' => $response ], 200);

    }
}
