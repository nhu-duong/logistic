<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller {

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
        if (Gate::denies('manage_user')) {
            abort(403);
        }
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function indexAction()
    {
        $users = User::all();
        return view('user.index', ['users' => $users, 'roles' => User::getRoles()]);
    }
    
    public function newAction()
    {
        return view('user.edit', [
            'user' => new User(),
        ]);
    }
    
    /**
     * 
     * @param type $orderId
     */
    public function editAction($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            App::abort(404);
        }
        return view('user.edit', [
            'user' => $user, 
        ]);
    }
    
    public function saveAction(Request $request)
    {
        $id = Input::has('id') ? Input::get('id') : 0;
        if ($id) {
            $user = User::find($id);
        } else {
            $user = new User();
        }
        
        $data = $this->getData($request);
        $validator = $this->validator($data, $id);
        if($validator->fails()) {
            $this->throwValidationException($request, $validator);
        }
        
        $user->fill($data);
        $user->save();
        
        if ($request->ajax()) {
            return response()->json([
                'result' => 1,
                'object' => $user,
            ]);
        } else {
            return response()->redirectToAction('UserController@indexAction');
        }
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $id = 0)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255' . (empty($id) ? '|unique:users' : ''),
            'password' => (empty($id) ? 'required|' : '') . 'min:6',
        ]);
    }
    
    protected function getData($request) 
    {
        $data = $request->all();
        
        $result = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role_id' => $data['role_id'],
        ];
        if (array_key_exists('password', $data)) {
            $result['password'] = bcrypt($data['password']);
        }
        return $result;
    }
}
