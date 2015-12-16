<?php namespace App\Http\Controllers;

use App\Port;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class PortController extends Controller {

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
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        $addresses = Address::all();
        return view('address.index', ['addresses' => $addresses]);
    }
    
    public function newAction()
    {
        return view('address.edit', [
            'add' => new Address()
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
        ]);
    }
    
    public function ajaxNewAction()
    {
        $port = new Port();
        return view('port.form', [
            'port' => $port,
        ]);
    }
    
    public function saveAction(Request $request)
    {
        $id = Input::has('id') ? Input::get('id') : 0;
        if ($id) {
            $port = Port::find($id);
        } else {
            $port = new Port();
        }
        $port->fill(Input::all());
        $port->save();
        
        if ($request->ajax()) {
            return response()->json([
                'result' => 1,
                'object' => $port,
            ]);
        } else {
            return response()->redirectToAction('index');
        }
    }
}
