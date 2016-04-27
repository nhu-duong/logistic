<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

    use DispatchesCommands,
        ValidatesRequests;
    
    public function getUserStatus()
    {
        $user = \Auth::user();
        if (!empty($user)) {
            return 1;
//            if ($user->is_active) {
//                $status = 1; // User is active
//            } else {
//                $status = 2; // User is not active
//            }
        }
        return 0;
    }
    
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
