<?php namespace App\Http\Controllers;

use App\Order;
use App\Attachment;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AttachmentsController extends Controller {

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
    public function index()
    {
        $addresses = Address::all();
        return view('address.index', ['addresses' => $addresses]);
    }
    
    public function uploadAction($orderId)
    {
        $order = Order::find($orderId);
        if (empty($order)) {
            return response()->json([
                'result' => 0,
                'message' => 'Order does not exist',
            ]);
        }
        
        $attachmentConfigPath = \Illuminate\Support\Facades\Config::get('filesystems.attachments.path');
        $destFolder = storage_path() . '/' . $attachmentConfigPath . '/' . $order->id;
        if (!file_exists($destFolder)) {
            mkdir($destFolder, 0775, true);
        }
        
        $mimeType = Input::file('attachment')->getMimeType();
        $fileName = Input::file('attachment')->getClientOriginalName();
        $formattedName = str_replace(' ', '_', $fileName);
        Input::file('attachment')->move($destFolder, $formattedName);
        
        $attachment = new Attachment([
            'order_id' => $order->id,
            'file_name' => $formattedName,
            'mime' => $mimeType,
            'created_by' => 1,
        ]);
        $attachment->save();
        
        $html = view('order.items.attachment', [
            'index' => $order->attachments->count(),
            'attachment' => $attachment,
        ])->render();
        
        return response()->json([
            'result' => 1,
            'html' => $html,
            'message' => 'Add attachment successful',
        ]);
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function downloadAction($id)
    {
        $attachment = Attachment::find($id);
        if (empty($attachment)) {
            App::abort(404);
        }
        $filePath = $attachment->getRealPath();
        if (empty($filePath) || !file_exists($filePath)) {
            App::abort(404);
        }
        return response()->download($filePath, $attachment->file_name);
    }
    
    /**
     * 
     * @param integer $id
     * @return Model
     */
    public function getModelObject($id)
    {
        return Attachment::find($id);
    }
    
    /**
     * Returning a redirect to previous page with flash data.
     *
     * @param  array  $data
     * @param  string $messsage
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectBack($data = [], $messsage = '') {
        return Redirect::back()->withInput()->with($data, $messsage);
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
                'address' => $address,
            ]);
        } else {
            return response()->redirectToAction('index');
        }
    }
}
