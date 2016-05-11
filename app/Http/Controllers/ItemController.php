<?php namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class ItemController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function indexAction()
    {
        $items = Item::paginate(8);
        return view('item.index', ['items' => $items]);
    }
    
    public function newAction()
    {
        return view('item.edit', [
            'item' => new Item(),
            'hasSubmitBtn' => true,
        ]);
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function editAction($id)
    {
        $item = Item::find($id);
        if (empty($item)) {
            App::abort(404);
        }
        return view('item.edit', [
            'item' => $item, 
            'hasSubmitBtn' => true,
        ]);
    }
    
    public function ajaxNewAction()
    {
        $item = new Item();
        return view('item.form', [
            'item' => $item,
        ]);
    }
    
    public function saveAction(Request $request)
    {
        $id = Input::has('id') ? Input::get('id') : 0;
        if ($id) {
            $item = Item::find($id);
        } else {
            $item = new Item();
        }
        $item->fill(Input::all());
        $item->save();
        
        if ($request->ajax()) {
            return response()->json([
                'result' => 1,
                'object' => $item,
            ]);
        } else {
            return response()->redirectToRoute('list_item');
        }
    }
    
    /**
     * 
     * @param integer $id
     * @return Model
     */
    public function getModelObject($id)
    {
        return Item::find($id);
    }
}
