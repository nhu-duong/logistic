<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\User;
use App\Code;
use Illuminate\Support\Facades;

class AuthController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Registration & Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users, as well as the
      | authentication of existing users. By default, this controller uses
      | a simple trait to add these behaviors. Why don't you explore it?
      |
     */

use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar) {
        $this->auth = $auth;
        $this->registrar = $registrar;

//        $this->middleware('guest', ['except' =>
//            ['getLogout', 'resendEmail', 'activateAccount', 'getUserInfo']]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
//    public function getRegister() {
//        return json_encode(['result' => 1, 'token' => csrf_token(), 'status' => $this->getUserStatus()]);
//    }
//
//    /**
//     * Handle a registration request for the application.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function postRegister(Request $request) {
//        $validator = $this->registrar->validator($request->all());
//        if ($validator->fails()) {
//            return json_encode(['result' => 0, 'message' => $validator->getMessageBag()->first()]);
////            $this->throwValidationException(
////                    $request, $validator
////            );
//        }
////        $activation_code = rand(100000,999999);
//        $user = new User;
//        $user->name = $request->input('name');
//        $user->prenom = $request->input('prenom');
//        $user->adresse = $request->input('adresse');
//        $user->ville = $request->input('ville');
//        $user->email = $request->input('email');
//        $user->password = bcrypt($request->input('password'));
//        $user->activation_code = $request->input('validate_code');
//        $user->phone = $request->input('phone');
//        
//        try {
//            if ($user->save()) {
//                $this->sendEmail($user);
//                \Auth::login($user, true);
//                return json_encode(['result' => 1]);
//            } else {
//                return json_encode(['result' => 0, 'message' => \Lang::get('notCreated')]);
//            }
//        } catch (\Exception $ex) {
//            return json_encode(['result' => 0, 'message' => $ex->getMessage()]);
//        }
//    }
//
//    public function sendEmail(User $user) {
//        mail($user->email, "Activate account", "Dear $user->name,
//            Please use this code: '$user->activation_code' to activate your account.
//            Thanks.");
//        return;
////        $data = array(
////            'name' => $user->name,
////            'code' => $user->activation_code,
////        );
////
////        \Mail::send('emails.activateAccount', $data, function($message) use ($user) {
////            $message->subject(\Lang::get('auth.pleaseActivate'));
////            $message->to($user->email);
////        });
//    }
//
//    /**
//     * Log the user out of the application.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function getLogout()
//    {
//        $this->auth->logout();
//
//        return json_encode(['result' => 1]);
//    }
//    
//    public function getUserInfo()
//    {
//        $user = \Auth::user();
//        return json_encode(['result' => 1, 'data' => $user, 'status' => $this->getUserStatus(), 'token' => csrf_token()]);
//    }
//
//    public function resendEmail() {
//        $user = \Auth::user();
//        if ($user->resent >= 3) {
//            return view('auth.tooManyEmails')
//                            ->with('email', $user->email);
//        } else {
//            $user->resent = $user->resent + 1;
//            $user->save();
//            $this->sendEmail($user);
//            return view('auth.activateAccount')
//                            ->with('email', $user->email);
//        }
//    }
//    
//    /**
//     * Check if user is login or not.
//     * 
//     * @return string
//     */
//    public function getStatus() {
//        return json_encode(['result' => 1, 'status' => $this->getUserStatus()]);
//    }
//
//    /**
//     * Validate code.
//     * 
//     * @param type $code
//     * @return type
//     */
//    public function activateAccount($code) {
//        if ($this->getUserStatus() == 1) {
//            return json_encode(['result' => 3, 'message' => 'You are already login.']);
//        }
//        $user = new User();
//        if ($user->getByCode($code)) {
//            return json_encode(['result' => 2, 'message' => 'Code is used.']);
//        }
//
//        $objCode = Code::where('token', '=', $code)->first();
//        if (empty($objCode)) {
//            return json_encode(['result' => 0, 'message' => 'Invalid code. Please try again!']);
//        }
//        return json_encode(['result' => 1, 'message' => \Lang::get('Valid code.')]);
//    }
//
//    /**
//     * Show the application login form.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function getLogin()
//    {
//        return json_encode(['result' => 1, 'token' => csrf_token(), 'status' => $this->getUserStatus()]);
//    }
//
//    /**
//     * Handle a login request to the application.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function postLogin(Request $request)
//    {
//        try {
//            $this->validate($request, [
//                'email' => 'required|email', 'password' => 'required',
//            ]);
//
//            $credentials = $request->only('email', 'password');
//
//            if ($this->auth->attempt($credentials, true))
//            {
//                return json_encode(['result' => 1, 'status' => $this->getUserStatus()]);
//            }
//
//            return json_encode(['result' => 0, 'message' => $this->getFailedLoginMessage()]);
//        } catch (\Exception $ex) {
//            return json_encode(['result' => 0, 'message' => $ex->getMessage()]);
//        }
//    }
//
//    public function postUserInfo(Request $request) {
//        if ($this->getUserStatus() != 1) {
//            return json_encode(['result' => -1, 'message' => 'Please login first.']);
//        }
//        
//        $user = \Auth::user();
//        $user->name = $request->input('name');
//        $user->prenom = $request->input('prenom');
//        $user->adresse = $request->input('adresse');
//        $user->ville = $request->input('ville');
//        $user->email = $request->input('email');
//        $user->phone = $request->input('phone');
//        
//        if ($user->save()) {
//            return json_encode(['result' => 1, 'message' => 'Save user information successfully!']);
//        }
//        
//        return json_encode(['result' => 0, 'message' => 'Can not save user information.']);
//    }
}
