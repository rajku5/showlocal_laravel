<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use DB;
use Illuminate\Support\Facades\DB;
//use Hash;
use Illuminate\Support\Facades\Hash;
//use Validator;
use Illuminate\Support\Facades\Validator;
use \Firebase\JWT\JWT;

class userController extends Controller
{

    public static function generateOtp(Request $request){

        try{
            $mobile = $request->mobile;
            $code = random_int(100000, 999999);
            $mobileVerificationStatus = DB::table('mobile_verification_status')->insert([
                'mobile'=> $mobile,
                'otp'=> $code,
            ]);

            return response()->json(["mobile"=>$mobile,"code"=>$code,"status"=>'success']);


        }catch(\Exception $e){
            return response()->json(["code"=>"Some Error Occured! Please try again.","status"=>'error'],500);
        }

    }


         //  verify mobile number
         public static function verifyOtp(Request $request){
            try{
                $mobile = $request->mobile;
                $code = $request->input_otp;
                $mobileVerificationData = DB::table('mobile_verification_status')->where('mobile',$mobile)->where('is_verified',0)->Orderby('id', 'desc')->first();
                if( $mobileVerificationData->otp === $code ){
                    if(isset($mobileVerificationData)){
                        $mobileVerificationupdate = DB::table('mobile_verification_status')->where('id',$mobileVerificationData->id)->update(['is_verified'=>1]);
                    }
                    if($mobileVerificationupdate){
                        return response()->json(["message"=>"successfully verified..","success"=>true]);
                       }
                }
                if(!isset( $mobileVerificationData)){
                    return response()->json(["message"=>"Data not present","success"=>false],500);

                }

                return response()->json(["message"=>"Opt is incorrect..","success"=>false],500);
            }catch(\Exception $e){
                return response()->json(["message"=>$e->getMessage(),"success"=>false],500);
            }
        }

            // user login
    public static function userLogin(Request $request){
        try{
            // dd($request->all());
            $userData = DB::table('users')->where('phone_number',$request->phone_number)->where('is_active',1)->first();
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
                    return response()->json(["status"=> true,"message"=>"login successfull..","token"=>$jwt,"userData"=>$userData],200);
                }
                return response()->json(["status"=> false,"message"=>"password incorrect.."],500);
            }else{
                return response()->json(["status"=> false,"message"=>"email/mobile is not present.."],500);
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
                "password"=>Hash::make($request->password),
                "otp_code"=>$otp_code
             ]);
             if(isset($userData)){
                return response()->json(["status"=> true,"message"=>"user registed"],200);
             }
             return response()->json(["status"=> false,"message"=>"something went wrong.."],500);

        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong..."],500);
        }
    }
        //  update wishlist
        public function updateWishlist(Request $request){
            //if($request->ajax()){
                $data = $request->all();
                $countWishlist=DB::table('wishlist')->where($data)->count();
                if($countWishlist==0){
                $wishlist=DB::table('wishlist')->insert($data);
                return response()->json(['action'=>'add','message'=>'Seller added successfully to wishlist']);
               } else{
                $removeWishlist=DB::table('wishlist')->where(['user_id'=>$data['user_id'],'seller_id'=>[$data['seller_id']]])->delete();
                return response()->json(['action'=>'delete','message'=>'Seller removed successfully from wishlist']);
            }
        }

        // view wishlist
        public static function viewWishlist(){
            $id=Auth::id();
            $wishlist=DB::table('wishlist')->select('seller_id')->where('user_id',$id)->get();
            $seller = DB::table('wishlist')->where('wishlist.user_id',$id)
            ->join('seller_master', 'seller_master.id', '=', 'wishlist.seller_id')->get();

            return view('wishlist',['seller' => $seller]);
        }

        // view user account information page
        public static function viewAccountInformation(){
            return view('accountInfo');
        }

        // update user account information page
        public static function updateAccountInformation(Request $request){
            try{
                $validated = $request->validate([
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => 'required|email',
                    'phonenumber' => 'required|min:10'
                    ]);

            $user=DB::table('users')->where('id',$request->id)->update([
                "first_name"=>$request->firstname,
                "last_name"=>$request->lastname,
                "email"=>$request->email,
                "phone_number"=>$request->phonenumber,
                "address"=>$request->address
            ]);
            return redirect()->back();
            } catch(Exception $e){

            }
        }

        // change user password view
        public static function changeUserPassword(){
            return view('changePassword');
        }

        // change user password submit
        public static function changeUserPasswordSubmit(Request $request){
            $validated = $request->validate([
                'new_password'=>'required|same:password_confirmation'
            ]);
            $password=Hash::make($request->new_password);
            $user=DB::table('users')->where('id',$request->id)->update([
                "password"=>$password
            ]);
            return redirect()->back();
        }

        // access visitor details for analysis
    public static function ImpressionCount(Request $request){

        $data=$request->all();
        $impre['useragent'] = $request->server('HTTP_USER_AGENT');
        $input['ip'] = $request->ip();
        $user_id = $data['user_id'];

        $current_path = $data['current_path'];
        $event_type = $data['event_type'];
        if($current_path==='/'){
            $current_path = 'home';
        }
        if($user_id!=null){
        $impression_count = DB::table('analytics')->where("user_id",$user_id)->count();
        } else{
            $impression_count = DB::table('analytics')->where("user_id",null)->where("impression_type",$impre['useragent'])->count();
        }
        $analytics=DB::table('analytics')->insert([
            "data"=>$input['ip'],
            "user_id"=>$user_id,

            "impression_type"=>$impre['useragent'],
            "impression_count"=>$impression_count,
            "page_type"=>$current_path,
            "event_type"=>$event_type
        ]);

        return response()->json(['data'=>$impre,'ip'=>$input,'user_id'=>$user_id]);
    }

    // user account information api
    public static function getUserDetail($id){
            $userDetail = DB::table('users')
            ->select('profile_image','first_name','last_name','email','phone_number','address')
            ->where('users.id',$id)->get();
            return $userDetail;
    }

    // update the user data
    public static function updateUserData(Request $request,$id){
        try{
            $userStatus = DB::table('users')->where('id', $id)->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'phone_number'=>$request->phone_number,
                "address"=>$request->address
            ]);
            return response()->json(["status"=> true,"message"=>"user Updated"],200);
        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);
        }
    }

    // user review list api



      // update the user password
    public static function updatePasswordChange(Request $request,$id){
        try{
              $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'password' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(["status"=> false,"message"=>"Validation failed "],500);
            }

            $userData = DB::table('users')->where('id', $id)->first();
            if(Hash::check($request->oldpassword, $userData->password)){
                   $userStatus = DB::table('users')->where('id', $id)->update([
                        "password"=>Hash::make($request->password),
                ]);
                return response()->json(["status"=> true,"message"=>"user password change"],200);
            }
         return response()->json(["status"=> false,"message"=>" old password incorrect "],500);
        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);
        }
    }



}
