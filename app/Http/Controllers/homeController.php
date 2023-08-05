<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\SellerMaster;
use Exception;
use Illuminate\Support\Facades\Validator;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
//use Cookie;
//use Mail;
//use Str;
//use Hash;

class homeController extends Controller
{
    //get home page
    public static function viewHome(Request $request){

        $category = DB::table('category_master')->where('status',1)->where('position',0)->get();
        $subCategoryData = DB::table('category_master')->where('position',1)->get();
        $subsubCategoryData = DB::table('category_master')->where('position',2)->get();
        $category = collect($category)->map(function($data) use($subCategoryData, $subsubCategoryData){
            if($data->parent_id === 0){

                // sub category section
                $subCategoryData = collect($subCategoryData)->where('parent_id',$data->id)->values()->all();

                if(count($subCategoryData) > 0){
                    $subsubCategoryData = collect($subCategoryData)->map(function($item)use($subsubCategoryData){
                        $subsubCategoryData =  collect($subsubCategoryData)->where('parent_id',$item->id)->values()->all();
                        $item->subsubCategoryData =  $subsubCategoryData;
                        return $item;
                    });
                    $data->subCategory =   $subsubCategoryData;
                }else{
                    $data->subCategory =   $subCategoryData;
                }
            }else{
                $data->subCategory = [];
            }
            return $data;
        });

        return view('home',['categoryLists'=>$category]);
    }
    //get FAQ page
    public static function viewFaq(){
        return view('faq');
    }
    //get Terms and condition page
    public static function viewTermsCondition(){
        $termCondition = DB::table('business_settings')->where('type','terms-condition')->first();
        return view('terms-conditions',["data"=> $termCondition]);
    }
    //get privacy policy page
    public static function viewPrivacyPolicy(){
        $privacyPolicy = DB::table('business_settings')->where('type','privacy-policy')->first();
        return view('privacy-policy',["data"=> $privacyPolicy]);
    }

      //get about us page
      public static function viewAboutus(){
        $aboutUs = DB::table('business_settings')->where('type','about-us')->first();
        return view('aboutus',["data"=> $aboutUs]);
    }

       //get contact us page
    public static function viewContactus(){
        return view('contactus');
    }
    //get contact us page
    public static function viewSellerRegistration(){
        return view('createSeller');
    }

    //  post Seller Registration
    public static function addSellerRegistration(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'email' => 'required|email',
                'contact_number' => 'required|numeric|digits:10',
                'whatsapp_number' => 'required|numeric|digits:10',
                'address' => 'required',
                'youtube' => 'required|url',
                'website' => 'required|url',

            ]);
            if ($validator->fails()) {
                return redirect('/seller-registration')->withErrors($validator)->withInput();
            }
            $data['first_name'] = $request->first_name;
            $data['password'] = Str::random(8);
            $password = Hash::make($data['password']);
            $sellerStatus = DB::table('seller_master')->updateOrInsert([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'contact_number'=>$request->contact_number,
                'whatsapp_number'=>$request->whatsapp_number,
                'address'=>$request->address,
                'youtube'=>$request->youtube,
                'website'=>$request->website,
                'password'=>$password]);
            Mail::send('mail', $data, function($message){
                $message->to('chaudhurieshika@gmail.com','Good Dishes')->subject
                   ('Password Confirmation Email');

            });
            return redirect()->back()->withSuccess('Successfully registration');

        }catch(Exception $e){
            return redirect()->back()->withErrors(['msg' => 'something wrong ...']);
        }
    }


    //get privacy policy page
    public static function viewCategory(){
        $category = DB::table('category_master')->where('status',1)->where('position',0)->get();
        $subCategoryData = DB::table('category_master')->where('position',1)->get();
        $subsubCategoryData = DB::table('category_master')->where('position',2)->get();


        $category = collect($category)->map(function($data) use($subCategoryData, $subsubCategoryData){
            if($data->parent_id === 0){

                // sub category section
                $subCategoryData = collect($subCategoryData)->where('parent_id',$data->id)->values()->all();

                if(count($subCategoryData) > 0){
                    $subsubCategoryData = collect($subCategoryData)->map(function($item)use($subsubCategoryData){
                        $subsubCategoryData =  collect($subsubCategoryData)->where('parent_id',$item->id)->values()->all();
                        $item->subsubCategoryData =  $subsubCategoryData;
                        return $item;
                    });
                    $data->subCategory =   $subsubCategoryData;
                }else{
                    $data->subCategory =   $subCategoryData;
                }
            }else{
                $data->subCategory = [];
            }
            return $data;
        });
        return view('category',['categoryLists'=>$category]);
    }



    //  add review
    public static function addReview(Request $request){
        try{
           $reviewStatus = DB::table('review_master')->updateOrInsert(['user_id'=>$request->user_id,'seller_id'=>$request->seller_id],
           ['user_id'=>$request->user_id,
           'seller_id'=>$request->seller_id,
           'review_text'=>$request->review_text,
           'rate'=>$request->rate
           ]);
           return redirect()->back();
        }catch(Exception $e){

        }
    }

    //  set pincode
    public static function setPincode(Request $request){
        try{

            $name = 'pincode';
            $value = $request->pincode;
            $minutes = 60;
            Cookie::queue($name, $value, $minutes,null, null, false, false);
            session()->put('user.pincode',$request->pincodee);
            return redirect()->back();

        }catch(Exception $e){

        }
    }

    //  search page result
    public static function getSearch(Request $request){
        try{
            $categoryLists = DB::table('category_master')->where('status',1)->where('position',0)->get();
            $sellerList = DB::select('call get_seller_list(?,?)',array((int)$request->category_type,$request->search_text ? $request->search_text : null));
            return view('search',['sellerLists'=>$sellerList,'categoryLists'=>$categoryLists]);
        }catch(Exception $e){

        }
    }

    // latitube and longitube
    public static function setLatitudeLongitude(Request $request){
        try{

        }catch(Exception $e){

        }
    }

    // get affiliate program page
    public static function viewAffiliateProgram(){
        return view('affiliateProgram');
    }

    // affiliate program submit
    public static function affiliateProgramSubmit(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required|min:10',
                'message' => 'required'


            ]);
        $affiliateData = DB::table('affiliate_program')->insert([
            "Name"=>$request->name,
            "Email"=>$request->email,
            "Mobile"=>$request->mobile,
            "Message"=>$request->message

         ]);
         return redirect()->back();
    } catch(Exception $e){

    }
}

//  get offer list api
public static function getOfferList(){
    try{
        $offerList  = DB::table('offer_banner')->select('image','url')->get();
        $offerList = collect($offerList)->map(function($value) {
            if(isset($value->image)){
               $value->image = env('APP_URL').'/'.$value->image;
           };
           return $value ;
       });
        return response()->json([
            "status"=>true,
            "message"=>"Offer List",
            "data"=>$offerList
        ]);

    } catch(Exception $e){
        return response()->json([
                "status"=>false,
                "message"=>"something went wrong...",
                "data"=>[]
            ]);
    }
}

    // get reel list
    public static function getReelList(){
        try{
            $reelList  = DB::table('reel_master')->get();
             $reelList = collect($reelList)->map(function($value) {
                    return env('APP_URL').''.$value->image ;
                });
              return response()->json([
                "status"=>true,
                "message"=>"reel List",
                "data"=>$reelList
            ]);


         }catch(Exception $e){
                return response()->json([
                        "status"=>false,
                        "message"=>"something went wrong...",
                        "data"=>[]
                    ]);
        }
    }

    // create reel
    public static function createReel(Request $request){
        try{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/reel'), $imageName);
            $reelList  = DB::table('reel_master')->insert([
                "image"=>'/storage/images/reel/'. $imageName,
                "position"=>$request->position,
                "is_status"=>1
                ]);

              return response()->json([
                "status"=>true,
                "message"=>"reel created"
            ]);


         }catch(Exception $e){
                return response()->json([
                        "status"=>false,
                        "message"=>"something went wrong...",
                        "data"=>[]
                    ]);
        }
    }

}
