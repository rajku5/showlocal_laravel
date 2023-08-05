<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use App\Models\UserPasswordReset;
use App\Exceptions\Handler;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



    //reset user password api method

    public static function resetPasswordLoad(Request $request){

        $resetData=UserPasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetData) > 0){
            $user=User::where('email',$resetData[0]['email'])->get();
            return response()->json(['success'=>true,'data'=>$user]);
        } else{
            return response()->json(['success'=>false,'data'=>'Token is not valid']);
        }
    }
    public static function resetUserPassword(Request $request){
        try{
        $request->validate([

            'password'=>'required|string|min:6|confirmed'
        ]);
        $resetData=UserPasswordReset::where('token',$request->token)->get();
        if(isset($request->token) && count($resetData) > 0){
        $password=Hash::make($request->password);
        $user=DB::table('users')->update(['password'=>$password]);
        return response()->json(['success'=>true,'data'=>'Password has been updated']);
        } else{
            return response()->json(['success'=>false,'data'=>'Token did not match']);
        }

        } catch(\Exception $e){
        return response()->json(['success'=>false,'data'=>'Password has not been updated']);
    }
    }
}




