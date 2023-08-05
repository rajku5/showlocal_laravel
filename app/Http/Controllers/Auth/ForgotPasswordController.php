<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserPasswordReset;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    //forgot user password api method

    
    public function submitForgetPasswordForm(Request $request){
        
            try{
                $user=User::where('email',$request->email)->get();
                if(count($user) > 0){
                    $token=Str::random(40);
                    $domain=URL::to('/');
                    $url=$domain.'/user/changePassword?token='.$token;
                    $data['url']=$url;
                    $data['email']=$request->email;
                    $data['title']="Password Reset";
                    $data['body']="Please click on below link to reset your password";
                    Mail::send('forgetPasswordMail',['data'=>$data],function($message) use($data){
                        $message->to($data['email'])->subject($data['title']);
                    });
                    $datetime=Carbon::now()->format('Y-m-d H:i:s');
                    UserPasswordReset::updateOrCreate(
                        ['email'=>$request->email],
                        [
                            'email'=>$request->email,
                            'token'=>$token,
                            'created_at'=>$datetime
                        ]
                        );
                    return response()->json(['success'=>true,'msg'=>'Please check your mail to reset password']);
                } else{
                    return response()->json(['success'=>false,'msg'=>'User not found']);
                }
            } catch(\Exception $e){
                return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
            }
        }
    }
