<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerPostRequest;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Seller;
//use DB;
use Illuminate\Support\Facades\DB;
use Arr;
//use Session;
use Illuminate\Support\Facades\Session;
//use Hash;
use Illuminate\Support\Facades\Hash;
//use Str;
use Illuminate\Support\Str;
//use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
//use Log;
use Illuminate\Support\Carbon;
//use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;

class sellerController extends Controller
{
    //  get seller list
    public static function getSellerList(){
        $sellerList = DB::table('seller_master')->where('is_active',1)->get();
        $pendingList = DB::table('seller_master')->where('status',0)->where('is_active',1)->get();
        $approvedList = DB::table('seller_master')->where('status',1)->where('is_active',1)->get();
        $rejectedList = DB::table('seller_master')->where('status',2)->where('is_active',1)->get();
        $sellerList = self::addStatus( $sellerList);
        $pendingList = self::addStatus( $pendingList);
        $approvedList = self::addStatus( $approvedList);
        $rejectedList = self::addStatus( $rejectedList);
        return view('admin.sellerList',["sellerLists"=>$sellerList,
                                        "pendingLists"=> $pendingList,
                                        "approvedLists"=> $approvedList,
                                        "rejectedLists"=> $rejectedList]);
    }


    public static function addStatus($data){
       $data = collect($data)->map(function($item,$key){
            $statusList = ['pending','Approved','Rejected'];
            $item->status  = $statusList[$item->status];
            return $item;
        });
        return $data;
    }


    //  web seller list
    public static function viewSellerList(request $request,$id){
        $categoryList = [];
        $sellerLists = DB::table('seller_master')
                            ->select('seller_master.*', DB::raw('COUNT(review_master.seller_id) AS reviewTotal'),DB::raw('AVG(review_master.rate) as reviewAvg'))
                            ->leftJoin('review_master','seller_master.id','review_master.seller_id')
                            ->where('seller_master.sub_sub_category_id',$id)
                            ->groupBy('seller_master.id')
                            ->get();

        if(count($sellerLists)){
            $categoryList = DB::table('category_master')->where('parent_id', $sellerLists[0]->category_id)->where('position',1)->get();
        }

        return view('sellerList',['sellerLists'=>$sellerLists,'categoryLists'=> $categoryList]);
    }

    //  view create seller page
    public static function viewAdminCreateSeller(){
        $categoryLists = DB::table('category_master')->select('id','name')->where('position',0)->get();
        $subcategoryLists = DB::table('category_master')->select('id','name')->where('position',1)->get();
        $subsubcategoryLists = DB::table('category_master')->select('id','name')->where('position',2)->get();

        return view('admin.createSeller',["categorylists"=> $categoryLists,
                                            "subcategoryLists"=>$subcategoryLists,
                                            "subsubcategoryLists"=>$subsubcategoryLists
                                            ]);
    }

        //  view create seller page
        public static function viewAdmineditSeller($id){
            $categoryLists = DB::table('category_master')->select('id','name')->where('position',0)->get();
            $subcategoryLists = DB::table('category_master')->select('id','name')->where('position',1)->get();
            $subsubcategoryLists = DB::table('category_master')->select('id','name')->where('position',2)->get();
            $sellerDetail = DB::table('seller_master')->where('id',$id)->first();
            $statusList = ['pending','Approved','Rejected'];
            return view('admin.editSeller',[
                                                "statusLists"=> $statusList,
                                                "sellerDetail"=> $sellerDetail,
                                                "categorylists"=> $categoryLists,
                                                "subcategoryLists"=>$subcategoryLists,
                                                "subsubcategoryLists"=>$subsubcategoryLists
                                                ]);
        }
    //  create seller
    public static function createAdminSeller(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|alpha',
           // 'last_name' => 'required|alpha',
            'email' => 'required|email',
            'contact_number' => 'required|numeric|digits:10',
            //'whatsapp_number' => 'required|numeric|digits:10',
            'weight' => 'required',
            'store_name' => 'required',
            'address' => 'required',
            'state' => 'required|alpha',
            'city' => 'required|alpha',
            'thumbnil_image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'

        ]);
        try{
            $requestData = $request->all();
            if($request->file('thumbnil_image')){
                $file= $request->file('thumbnil_image');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['thumbnil_image']= $filename;
            }

            //   image section

            if($request->file('image1')){
                $file= $request->file('image1');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image1'] =$filename;
            }


            if($request->file('image2')){
                $file= $request->file('image2');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image2']= $filename;
            }
            if($request->file('image3')){
                $file= $request->file('image3');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image3']= $filename;
            }
            if($request->file('image4')){
                $file= $request->file('image4');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image4']= $filename;
            }
            if($request->file('image5')){
                $file= $request->file('image5');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image5']= $filename;
            }
            // offer section
            if($request->file('offer1')){
                $file= $request->file('offer1');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer1']= $filename;
            }
            if($request->file('offer2')){
                $file= $request->file('offer2');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer2']= $filename;
            }
            if($request->file('offer3')){
                $file= $request->file('offer3');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer3']= $filename;
            }
            if($request->file('offer4')){
                $file= $request->file('offer4');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer4']= $filename;
            }
            if($request->file('offer5')){
                $file= $request->file('offer5');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer5']= $filename;
            }
                $data['first_name'] = $request->first_name;
                $data['password'] = Str::random(8);
                $password = Hash::make($data['password']);
                $requestData['password']=$password;
                $detailStatus = DB::table('seller_master')->insert($requestData);
                Mail::send('mail', $data, function($message){
                    $message->to('chaudhurieshika@gmail.com','Good Dishes')->subject
                       ('Password Confirmation Email');
                });
                if($detailStatus){
                    return redirect()->route('admin.view.seller.list', ['status' => 'success']);
                }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }


    // seller api_insert

    public function seller_create(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|alpha',
           // 'last_name' => 'required|alpha',
            'email' => 'required|email',
            'contact_number' => 'required|numeric|digits:10',
            //'whatsapp_number' => 'required|numeric|digits:10',
            'weight' => 'required',
            'store_name' => 'required',
            'address' => 'required',
            'state' => 'required|alpha',
            'city' => 'required|alpha',
            'thumbnil_image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'

        ]);


        //dd($request->all());

        try{
            //dd($request->all());
            if($request->file('thumbnil_image')){
                $file= $request->file('thumbnil_image');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['thumbnil_image']= $filename;
            }




            $sellerData = DB::table('seller_master')->insert([

                "first_name"=>$request->first_name,
                "contact_number"=>$request->contact_number,
                "weight"=>$request->weight,
                "store_name"=>$request->store_name,
                "address"=>$request->address,
                "state"=>$request->state,
                "city"=>$request->city,
                "whatsapp_number"=>$request->whatsapp_number,
                "thumbnil_image"=>$request->thumbnil_image,
                "latitude"=>$request->latitude,
                "longitude"=>$request->longitude,



            ]);

            //dd($sellerData);
            if(isset($sellerData)){
                return response()->json(["status"=> true,"message"=>"user registed"],200);
            }
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);

        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong..."],500);
        }
    }

    //  edit seller
    public static function editAdminSeller(Request $request){
        $validated = $request->validate([
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email',
            'contact_number' => 'required|numeric|digits:10',
            'whatsapp_number' => 'required|numeric|digits:10',
            'store_name' => 'required',
            'address' => 'required',
            'state' => 'required|alpha',
            'city' => 'required|alpha',
            'thumbnil_image' => 'mimes:jpg,png,jpeg',

        ]);
        try{
            $requestData = $request->all();
            //  image upload
            if($request->file('thumbnil_image')){
                $file= $request->file('thumbnil_image');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['thumbnil_image']= $filename;
            }

            //   image section

            if($request->file('image1')){
                $file= $request->file('image1');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image1'] =$filename;
            }


            if($request->file('image2')){
                $file= $request->file('image2');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image2']= $filename;
            }
            if($request->file('image3')){
                $file= $request->file('image3');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image3']= $filename;
            }
            if($request->file('image4')){
                $file= $request->file('image4');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image4']= $filename;
            }
            if($request->file('image5')){
                $file= $request->file('image5');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['image5']= $filename;
            }
            // offer section
            if($request->file('offer1')){
                $file= $request->file('offer1');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer1']= $filename;
            }
            if($request->file('offer2')){
                $file= $request->file('offer2');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer2']= $filename;
            }
            if($request->file('offer3')){
                $file= $request->file('offer3');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer3']= $filename;
            }
            if($request->file('offer4')){
                $file= $request->file('offer4');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer4']= $filename;
            }
            if($request->file('offer5')){
                $file= $request->file('offer5');
                $filename= date('YmdHi').'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $requestData['offer5']= $filename;
            }

            // dd($request->all());
            $updatedetailStatus = DB::table('seller_master')->where('id',$request->id)->update($requestData);
            if($updatedetailStatus){
                return redirect()->route('admin.view.seller.list');
            }
            return redirect()->route('admin.view.seller.list');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    //  view seller registration
    public static function viewSellerRegistration(){
        try{
            return view('createSeller');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    //  register seller
    public static function createSellerRegistration(SellerPostRequest $request){
        try{

        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    //  detail seller
    public static function viewSellerDetail($id){
        try{

            $sellerDetail = DB::table('seller_master')->where('id',$id)->first();
            return view('sellerDetail',['sellerDetail'=>$sellerDetail]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    //  api
    public static function sellerRegistration(Request $request){
        try{
            $sellerStatus = DB::table('seller_master')->updateOrInsert(['email'=>$request->email,'contact_number'=>$request->contact_number],$request->all());
            return response()->json([
                "status"=>true,
                "message"=>"Seller Register successfully",
            ]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    // seller login submit
    public static function sellerLoginSubmit(Request $request){
            $seller = DB::table('seller_master')->where('email',$request->email)->first();
            if($seller){
            if(Hash::check($request->password, $seller->password)){
            Session::put('seller_id', $seller->id);
            return redirect()->route('dashboard');
        } else{
            return redirect()->back();
        }
    } else{
        return redirect()->back();
    }
    }

    // seller dashboard
    public static function viewDashboard(){
        $id = session()->get('seller_id');
        $seller = DB::table('seller_master')->where('id',$id)->first();
        $subscription = DB::table('subscription_purchased')->where('seller_id',$id)->first();
        if($subscription){
        $plan = DB::table('subscription_plan')->where('id',$subscription->plan_id)->first();
        } else{
            $plan=null;
        }
        $sellerDetail = 'seller-detail/'.$id;
        $event_type = 'load';
        $currentDate = Carbon::now()->toDateTimeString();
        $pastSevenDays = Carbon::now()->subDays(7)->toDateTimeString();
        $range = CarbonPeriod::create($pastSevenDays, $currentDate);
        $date = $range->toArray();
        foreach ($date as $date){
            $newDate[] = date('d-m-Y', strtotime($date));
            $userCount[] = DB::table('analytics')
            ->where('page_type',$sellerDetail)
            ->where('event_type',$event_type)
            ->whereDate('created_at',$date)->count();
        }
    $userTotalCount = DB::table('analytics')->where('page_type',$sellerDetail)->where('event_type',$event_type)->count();
    return view('seller.dashboard',['plan'=>$plan,'subscription'=>$subscription,'seller'=>$seller])
            ->with('userTotalCount',$userTotalCount)
            ->with('userCount',json_encode($userCount,JSON_NUMERIC_CHECK))
            ->with('newDate',json_encode($newDate));
    }

    // view qr code
    public static function qrcode(){
        $id = session()->get('seller_id');
        //$seller_id = DB::table('seller_master')->select('id')->where('id',$id)->first();
        return view('seller.qrCode',['id'=>$id]);
    }

    // view seller profile
    public static function sellerProfile(){
        $id = session()->get('seller_id');
        $seller = DB::table('seller_master')->where('id',$id)->first();
        return view('seller.profile',['seller'=>$seller]);
    }

    // update seller profile
    public static function updateProfile(Request $request){
        try{
            $validated = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'whatsapp_number' => 'required|min:10',
                'contact_number' => 'required|min:10'
                ]);

        $seller = DB::table('seller_master')->where('id',$request->id)->update([
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "address" => $request->address,
            "whatsapp_number" => $request->whatsapp_number,
            "contact_number"=>$request->contact_number
        ]);
        return redirect()->back();
        } catch(Exception $e){

        }
    }

    // seller logout
    public static function sellerLogout(Request $request){
        $request->session()->flush();
        return redirect()->route('seller.login');
    }

    // delete admin seller
    public static function deleteAdminSeller(Request $request){
        $deleteSeller =  DB::table('seller_master')->where('id',$request->id)->delete();
        return redirect()->route('admin.view.seller.list');
    }

    // generate coupon code
    public static function generateCouponCode(Request $request){
        $data = $request->all();
        $seller_id = $data['seller_id'];
        $code = Str::random(5);
        $seller =  DB::table('seller_master')->where('id',$seller_id)->first();
        if($seller->coupon_code!=null){
            return response()->json(["status"=> true,"message"=>"code already exists"]);
        } else{
            $insertCode = DB::table('seller_master')->where('id',$seller_id)->update(["coupon_code"=>$code]);
            return response()->json(["status"=> true,"message"=>"code generated"]);
        }
    }

    // view coupon code
    public static function viewCouponCode($id){
        $seller =  DB::table('seller_master')->where('id',$id)->first();
            return view('couponCode',['seller'=>$seller]);

    }

    // view subscriptions
    public static function viewSubscription(){
        $seller_id = session()->get('seller_id');
        $subscription =  DB::table('subscription_plan')->where('status',1)->get();
        $subscriber =  DB::table('subscription_purchased')->where('seller_id',$seller_id)->first();
            return view('seller.subscriptionPlans',['subscription'=>$subscription,'subscriber'=>$subscriber,'seller_id'=>$seller_id]);

    }

    // purchase subscription
    public static function purchaseSubscription(Request $request){
        $data = $request->all();
        $seller_id = session()->get('seller_id');
        if(DB::table('subscription_purchased')->where('seller_id',$seller_id)->exists()){
            return response()->json(["status"=> false,"message"=>"you are already subscribed"]);
        }
        $plan_id = $data['id'];
        $period_start = Carbon::now();
        $duration = DB::table('subscription_plan')->where('id',$plan_id)->select('duration_days')->first();
        $period_end = Carbon::now()->addDays($duration->duration_days);
        $subscription =  DB::table('subscription_purchased')->insert([
        "seller_id"=>$seller_id,
        "plan_id"=>$plan_id,
        "period_start"=>$period_start,
        "period_end"=>$period_end]);
        return response()->json(["status"=> true,"message"=>"subscription added","value"=>$duration->duration_days]);

    }
    // seller list api
    public static function getSellerListInfo(Request $request){
        Log::info($request->all());

        $query = DB::table('seller_master')
                        ->join('category_master','category_master.id','seller_master.category_id')
                        ->select('seller_master.id as seller_id','thumbnil_image as shop_image','store_name as shop_name','contact_number as shop_number','category_master.name as category_name','seller_master.latitude as latitude','seller_master.longitude as longitude');
                        if(isset($request->category_id) && $request->category_id){
                            $query->where('seller_master.category_id',$request->category_id);
                            $query->orWhere('seller_master.sub_category_id',$request->category_id);
                            $query->orWhere('seller_master.sub_sub_category_id',$request->category_id);
                        }
              $sellerList = $query->get();

        $sellerList = collect($sellerList)->map(function($value) {
            if(isset($value->shop_image)){
                $value->shop_image = env('APP_URL').'/images/'.$value->shop_image;
            };
            return $value ;
        });
        $reviewList = DB::table('review_master')->select('review_text','rate')->get();
        $sellerList = collect($sellerList)->map(function ($item, $key) use($reviewList) {
            $average=collect($reviewList)->where('seller_id',$item->seller_id)->avg('rate');
            $total=collect($reviewList)->where('seller_id',$item->seller_id)->count('rate');
            $item->total_review =  $total;
            $item->rating=round($average,1);
            return $item ;
        });

        return  response()->json(['data'=>$sellerList]);
    }

    // seller detail api
    public static function getSellerDetail($id){
            $review = DB::table('review_master')
                          ->leftJoin('users','users.id','review_master.user_id')
                          ->select('review_text','rate')
                          ->where('seller_id',$id)->get();
            $sellerDetail = DB::table('seller_master')
                            ->join('category_master','category_master.id','seller_master.category_id')
                            ->select('seller_master.*','category_master.name as category_name')
                            ->where('seller_master.id',$id)
                            ->first();
            $ShopCategory = $sellerDetail->category_name;
            $imageList = DB::table('seller_master')->select('image1','image2','image3','image4','image5')->where('seller_master.id',$id)->get()->toArray();
            $images = [];
            foreach ($imageList[0] as $key => $value) {
                $images[]=(object)["image"=>env('APP_URL').'/images/'.$value];
            }

            $offerList = DB::table('seller_master')->select('offer1','offer2','offer3','offer4','offer5')->where('seller_master.id',$id)->get();
            $offers = [];
            foreach ($offerList[0] as $key => $value) {
                $offers[]=(object)["image"=>env('APP_URL').'/images/'.$value];
            }
                 //  review list
            $reviewList = [];
            foreach ($review as $key => $value) {
                    $reviewList[]= (object)["profile_image"=>null,"category"=>$ShopCategory,"review_text"=>$value->review_text];
                # code...
            }

            $sellerDetail->images = $images;
            $sellerDetail->offer = $offers;
            $sellerDetail->reviewList=$reviewList;
            $average=collect($review)->avg('rate');
            $total=collect($review)->count('rate');
            $sellerDetail->average=round($average,1);
            $sellerDetail->total_count=$total;
            return  response()->json(['data'=>$sellerDetail]);

        }

}
