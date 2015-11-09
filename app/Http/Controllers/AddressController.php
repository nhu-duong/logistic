<?php namespace App\Http\Controllers;

use App\Order;
use Validator;
use App\Agent;
use App\Address;
use App\Ship;
use App\Port;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class AddressController extends Controller {

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
    
    public function ajaxNewAction($forceType)
    {
        $address = new Address();
        $address->$forceType = 1;
        return view('address.form', [
            'address' => $address,
            'forceType' => [$forceType => 1],
        ]);
    }
    
    public function postSaveOrder($orderId)
    {
        echo $orderId;
        $order = new Order(Input::all());
        $order->save();
        dd(Input::all());
    }
}
