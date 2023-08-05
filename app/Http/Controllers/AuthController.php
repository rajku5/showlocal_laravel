<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use \Firebase\JWT\JWT;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Mail\userRegister;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AdminLoginPostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
//use Redirect;
// use App\Http\Requests\AdminLoginPostRequest;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['adminLogout']]);
    }


    //  admin section
    //  admin login

    public static function adminLogin(AdminLoginPostRequest $request){
        try{
            $requestData = (object)$request->safe()->only(['email', 'password']);
            $admin = Admin::where('email', $request->email)->first();

            if (isset($admin) && $admin->status != 1) {
                return redirect()->back()->withInput($request->only('email', 'remember'))
                    ->withErrors(['You are blocked!!, contact with admin.']);
            }else{
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('admin.dashboard');
                }
            }

            return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
        }catch(Exception $e){

            return redirect()->back()->withInput($request->only('email', 'remember'))
            ->withErrors(['Credentials does not match.']);
        }
    }
    //  admin logout
    public static function adminLogout(Request $request){
        try{
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }catch(Exception $e){


        }
    }

    // web user login
    public static function Register(Request $request){
        try{

            $validator = Validator::make($request->all(), [
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'email' => 'required',
                'password' => 'confirmed|required|max:30',
                'phone_number' => 'required|numeric|digits:10',

            ]);


            if ($validator->fails()) {
                return redirect('/#signup')->withErrors($validator)->withInput();
            }

            $request->request->remove('_token');
            $request->request->remove('input_otp');
            $request->request->remove('password_confirmation');
            $request->merge(['password'=>Hash::make($request->password)]);

            $userStatus = User::create($request->all());
            if($userStatus){
                //Mail::to($request->email)->send(new userRegister());
                return redirect()->route('home', ['status' => 'success']);
            }
            return Redirect::back()->with('query_data','#singUp');

        }catch(Exception $e){
           dd($e->getMessage());

        }

    }

    //  web user login
    public static function Login(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'number' => 'required',
                'password' => 'required',
            ]);


            if ($validator->fails()) {
                return redirect('/#login')->withErrors($validator)->withInput();
            }

               if(Auth::attempt(['phone_number' => $request->number, 'password' => $request->password])){
                    $request->session()->put('user.id',Auth::user()->id);
                    return redirect()->back();

            }
            return redirect('/#login')->withErrors([
                'number' => 'The provided credentials do not match our records.',
                'password' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');

        }catch(Exception $e){
           return $e->getMessage();
        }
    }

    // logout
    public static function Logout(Request $request){
        try{
            $request->session()->flush();
            return back();
        }catch(Exception $e){
            return $e->getMessage();
         }
    }

    // api section
    // user login
    public static  function userLogin(Request $request){
        try{
            $userData = User::where('phone_number',$request->phone_number)->where('is_active',1)->first();
            if(isset($userData)){

                if (Hash::check($request->password, $userData->password)) {
                    $key = env('JWT_KEY');
                    $payload = [
                        'iss' => 'http://showlocal.com',
                        'aud' => $request->email,
                        'iat' => 1356999524,
                        'nbf' => 1357000000
                    ];
                    $jwt = JWT::encode($payload, $key, 'HS256');
                    return response()->json(["status"=> true,"message"=>"login successfull..","token"=>$jwt],200);
                }
                return response()->json(["status"=> false,"message"=>"password incorrect.."],500);
            }else{
                return response()->json(["status"=> false,"message"=>"email is not present.."],500);
            }
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);

        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);

        }
    }

    // user register
    public static function userRegister(Request $request){
        try{
            $otp_code = mt_rand(100000, 999999);
            $userData = DB::table('users')->insert([
                "email"=>$request->email,
                "phone_number"=>$request->phone_number,
                "password"=>Hash::make($request->Password),
                "otp_code"=>$otp_code
             ]);
             if(isset($userData)){
                return response()->json(["status"=> true,"message"=>"user registed"],200);
             }
             return response()->json(["status"=> false,"message"=>"something went wrong.."],500);

        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);
        }
    }

    //  send mail test
    public function sendMail(){
        Mail::to('mjayesh.92@gmail.com')->send(new userRegister());
        return response()->json(["status"=> true,"message"=>"mail send"],200);
    }
}
