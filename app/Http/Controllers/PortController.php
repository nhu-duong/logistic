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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function indexAction()
    {
        $ports = Port::paginate(8);
        return view('port.index', ['ports' => $ports]);
    }
    
    public function newAction()
    {
        return view('port.edit', [
            'port' => new Port(), 
            'hasSubmitBtn' => true,
        ]);
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function editAction($id)
    {
        $port = Port::find($id);
        if (empty($port)) {
            App::abort(404);
        }
        return view('port.edit', [
            'port' => $port, 
            'hasSubmitBtn' => true, 
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
            return response()->redirectToRoute('list_port');
        }
    }
    
    /**
     * 
     * @param integer $id
     * @return Model
     */
    public function getModelObject($id)
    {
        return Port::find($id);
    }
}
