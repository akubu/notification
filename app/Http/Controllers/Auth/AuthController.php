<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Guard;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Social;
use App\Models;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    //
    protected $auth;

    protected $userRepository;

    public function __construct( Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|confirmed|min:6',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
//    }

    public function getSocialRedirect( $provider )
    {
        $providerKey = \Config::get('services.' . $provider);
        if(empty($providerKey))
            return view('pages.status')
                ->with('error','No such provider');

        return Socialite::driver( $provider )->redirect();

    }

    public function getSocialHandle( $provider )
    {
        $user = Socialite::driver( $provider )->user();
        $flag=0;
        foreach (Models\Employee::all() as $e)
        {
            if($e->email==$user->email)
            {
                $flag=1;
                break;
            }
        }
        if($flag==0)
        {
            return redirect('welcomeError');
        }
        $socialUser = null;
        $userCheck = User::where('email', '=', $user->email)->first();
        if(!empty($userCheck))
        {
            $socialUser = $userCheck;
        }
        else
        {
            $sameSocialId = Social::where('social_id', '=', $user->id)->where('provider', '=', $provider )->first();

            if(empty($sameSocialId))
            {

                $newSocialUser = new User;
                $newSocialUser->email              = $user->email;
                //$name = explode(' ', $user->name);
                $newSocialUser->name         = $user->name;
                //$newSocialUser->last_name          = $name[1];
                $newSocialUser->save();

                $socialData = new Social;
                $socialData->social_id = $user->id;
                $socialData->provider= $provider;
                $socialData->save();

                $socialUser = $newSocialUser;
            }
            else
            {
                //Load this existing social user
                $socialUser = $sameSocialId->user;
            }

        }

        $this->auth->login($socialUser, true);
        // $this->auth
        
        
        return redirect('/loginNotification');


    }


    public function validateVtigerUser(Request $request)
    {
        //create user validation link
        $url = "http://power2sme.com/p2sapi/ws/v3/userlogin";

        $data = array('userId' => $request->input('username'),
            'password' => $request->input('password'));


        //make curl request to validate user
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, 'website:p2sWebs!te');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data)))
        );
        $result = json_decode(curl_exec ($ch));

        //if login id and password combination is correct, allow login
        if($result->ErrorCode == 0) {

            //dd($result);
            //put details in laravel session
            session_start();
            $_SESSION['vt_user'] = $request->input('username');
            Session::put('authenticated', true);
            Session::put('vt_user', $request->input('username'));
            $name = $result->Data->employee->firstName .' '. $result->Data->employee->lastName;

            Session::put('vt_user_name', $name ); // +' ' + $request->input('lastname'));


            //hack for deals codebase

            $response = array();
            $response['error'] = false;
//            $uri = $request->path();
//dd($uri);
//            if($uri == "webApp"){
//                $response['redirect'] = '/webApp';
//            }else {

            //$redirect_to  = Session::get('redirectURL');
            $redirect_to  = "/loginNotification";

            if($redirect_to == null)
                $redirect_to = "/loginNotification";

            $response['redirect'] = $redirect_to;


            $newSocialUser = new User;
            $username=$request->input('username');
            $email=Models\Employee::where('emp_code','=',$username)->pluck('email');
            $name=Models\Employee::where('emp_code','=',$username)->pluck('name');
            $userCheck = User::where('email', '=', $email)->first();
            if(!empty($userCheck))
            {
                $socialUser = $userCheck;
            }
            else{
                $newSocialUser->email= $email;
                $newSocialUser->name= $name;
                $newSocialUser->save();
                $socialUser=$newSocialUser;
            }

            $this->auth->login($socialUser, true);

        } else {

            Session::put('authenticated', false);


            $response = array();
            $response['error'] = true;
            $response['message'] = 'Please use valid login username and password.';
        }
        //dd(response()->json($response));
        return response()->json($response);
    }


    public function logout()
    {
        $this->auth->logout();
        return redirect('/');
    }

}
