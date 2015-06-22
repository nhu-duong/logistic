<?php namespace App\Http\Controllers;

use App\Record;
use Validator;
use Illuminate\Http\Request;

class HomeController extends Controller {

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
//		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}
        
        public function getListRecord()
        {
            $records = Record::all();
            $types = ['None', 'Electicité', 'Eau', 'Gaz'];
            return view('records', ['records' => $records, 'types' => $types]);
        }
        
        public function getAddRecord(Request $request) 
        {
            return json_encode(['result' => 1, 'token' => csrf_token(), 'status' => $this->getUserStatus()]);
        }
        
        /**
        * Handle a registration request for the application.
        *
        * @param  \Illuminate\Http\Request  $request
        * @return \Illuminate\Http\Response
        */
        public function postAddRecord(Request $request)
        {
            if ($this->getUserStatus() != 1) {
                return json_encode(['result' => -1, 'message' => 'Please login first!']);
            }
            $data = $request->all();
            $data['value'] = intval($data['value']);
            $validate = $this->validateRecord($data);
//            return json_encode(['result' => 0, 'message' => 'validate failed!' . json_encode($validate->passes())]);
            if ($validate->fails()) {
                return json_encode(['result' => 0, 'message' => implode('<br/>', $validate->getMessageBag()->toArray())]);
            }
            $user = \Auth::user();
            $record = new Record();
            $record->user_id = $user->id;
            $record->record_type = $request->get('record_type');
            $record->value = $request->get('value');
            $record->value_2 = $request->get('value_2');
            $record->remote_ip = $request->ip();
            
            try {
                if ($record->save()) {
                    return json_encode(['result' => 1, 'message' => 'You have successfully create a new record.']);
                }
                return json_encode(['result' => 0, 'message' => 'Can not save record!']);
            } catch (\Exception $ex) {
                return json_encode(['result' => 0, 'message' => $ex->getMessage()]);
            }
//            `user_id`, `record_type`, `value`, `value_2`, `image`, `image_2`, `remote_ip`, 
//            `imei`, `latitude`, `longitude`
        }
        
        /**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
        public function validateRecord($data) {
            return Validator::make($data, [
                'record_type' => 'required|min:1|max:4',
                'value' => 'required|digits_between:1,99999',
                'value_2' => 'required_if:record_type,1|min:1|max:99999',
            ]);
        }

}
