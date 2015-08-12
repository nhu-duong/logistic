<?php namespace App\Http\Controllers;

use App\Order;
use Validator;
use App\Agent;
use App\Address;
use App\Ship;
use App\Port;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class OrdersController extends Controller {

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
        return view('order.index');
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function getEditOrder($orderId)
    {
        if (empty($orderId)) {
            $order = new Order();
        } else {
            $order = Order::find($orderId);
        }
        $agents = Agent::all()->lists('name', 'id');
        $buyers = Address::all()->where('is_buyer', 1)->lists('name', 'id');
        $sellers = Address::all()->where('is_seller', 1)->lists('name', 'id');
        $ships = Ship::all()->lists('name', 'id');
        $ports = Port::all()->lists('name', 'id');
        return view('order.edit', [
            'orderId' => $orderId, 
            'order' => $order,
            'agents' => $agents,
            'buyers' => $buyers,
            'sellers' => $sellers,
            'ships' => $ships,
            'ports' => $ports,
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
