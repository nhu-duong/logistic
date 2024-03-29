<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Order;
use Validator;
use App\Agent;
use App\Address;
use App\Ship;
use App\Port;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\PDF;

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
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index() {
        $keyword = Input::get('s', '');
        if (!empty($keyword)) {
            $allOrders = Order::where('master_bill_no', 'like', '%' . $keyword . '%')
                    ->orWhere('house_bill_no', 'like', '%' . $keyword . '%')
                    ->get();
        } else {
            $allOrders = Order::all();
        }
//        foreach ($allOrders as $order) {
//            dd($order->buyer);
//        }
        return view('order.index', ['orders' => $allOrders, 'keyword' => $keyword]);
    }

    /**
     * 
     * @param type $orderId
     */
    public function getEditOrder($orderId) {
        if (empty($orderId)) {
            $order = new Order();
        } else {
            $order = Order::find($orderId);
        }
        
        $agents = Agent::all()->lists('name', 'id')->toArray();
        $buyers = Address::where('is_buyer', 1)->lists('name', 'id')->toArray();
        $sellers = Address::where('is_seller', 1)->lists('name', 'id')->toArray();
        $ships = Ship::all()->lists('name', 'id')->toArray();
        $ports = Port::all()->lists('name', 'id')->toArray();
        $containers = $order->containers()->get();
        return view('order.edit', [
            'orderId' => $orderId,
            'order' => $order,
            'agents' => $agents,
            'buyers' => $buyers,
            'sellers' => $sellers,
            'ships' => $ships,
            'ports' => $ports,
            'containers' => $containers,
        ]);
    }

    public function postSaveOrder($orderId) {
        if (!empty($orderId)) {
            $order = Order::find($orderId);
        } else {
            $order = new Order();
        }
        $order->fill(Input::all());
        $order->save();
        return Redirect::route('edit_order', array($order->id));
    }

    public function test() {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('pdf.invoice', ['name' => 'Nhu']);
        return $pdf->stream();
//        $pdf = PDF::loadView('pdf.invoice', ['name' => 'Nhu']);
//        return $pdf->download('invoice.pdf');
    }

}
