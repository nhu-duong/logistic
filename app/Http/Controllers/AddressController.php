<?php namespace App\Http\Controllers;

use App\Address;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class AddressController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function indexAction()
    {
        $addresses = Address::paginate(8);
        return view('address.index', ['addresses' => $addresses]);
    }
    
    public function newAction()
    {
        return view('address.edit', [
            'address' => new Address(),
            'hasSubmitBtn' => true,
            'forceType' => [],
        ]);
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function editAction($id)
    {
        $address = Address::find($id);
        if (empty($address)) {
            App::abort(404);
        }
        return view('address.edit', [
            'address' => $address, 
            'hasSubmitBtn' => true,
            'forceType' => [],
        ]);
    }
    
    public function ajaxNewAction($forceType)
    {
        $address = new Address();
        $address->$forceType = 1;
        return view('address.form', [
            'address' => $address,
            'forceType' => [$forceType => 1],
        ]);
    }
    
    public function saveAction(Request $request)
    {
        $id = Input::has('id') ? Input::get('id') : 0;
        if ($id) {
            $address = Address::find($id);
        } else {
            $address = new Address();
        }
        $address->fill(Input::all());
        $address->save();
        
        if ($request->ajax()) {
            return response()->json([
                'result' => 1,
                'object' => $address,
            ]);
        } else {
            return response()->redirectToRoute('list_address');
        }
    }
    
    /**
     * 
     * @param integer $id
     * @return Model
     */
    public function getModelObject($id)
    {
        return Address::find($id);
    }
}
