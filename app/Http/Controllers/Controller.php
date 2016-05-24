<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    public function deleteAction($id)
    {
        $item = $this->getModelObject($id);
        if (empty($item)) {
            return response()->json(['result' => 0, 'errorCode' => 101, 'message' => 'Item not found!']);
        }
        $item->delete();
        
        return response()->json(['result' => 1, 'deletedId' => $id]);
    }
}
