<?php namespace App\Http\Controllers;

use App\Order;
use App\Container;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;

class ContainersController extends Controller {

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
    
    public function ajaxNewAction($orderId)
    {
        $order = Order::find($orderId);
        if (empty($order)) {
            return 'Order does not exist.';
        }
        $container = new Container();
        return view('container.form', [
            'container' => $container,
            'order' => $order,
        ]);
    }
    
    public function saveAction(Request $request)
    {
        $id = Input::has('id') ? Input::get('id') : 0;
        if ($id) {
            $container = Container::find($id);
        } else {
            $container = new Container();
        }
        $container->fill(Input::all());
        $container->save();
        
        if ($request->ajax()) {
            return response()->json([
                'result' => 1,
                'customAction' => 'update-container',
                'object' => [
                    'container' => $container,
                    'rowhtml' => view('order.items.container', ['cont' => $container])->render() 
                ],
            ]);
        } else {
            return response()->redirectToAction('index');
        }
    }
    
    public function deleteAction($id)
    {
        $container = Container::find($id);
        if (empty($container)) {
            return response()->json(['result' => 0, 'errorCode' => 101, 'message' => 'Container not found!']);
        }
        $container->delete();
        
        return response()->json(['result' => 1, 'contId' => $id]);
    }
}
