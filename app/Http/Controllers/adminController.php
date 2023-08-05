<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;

class adminController extends Controller
{

    //  view dashbaord
    public static function viewDashboard(){
        $categoryCount = DB::table('category_master')->count();
        $userCount = DB::table('users')->count();
        $sellerCount = DB::table('seller_master')->count();

        $currentDate = Carbon::now()->toDateTimeString();
        $pastSevenDays = Carbon::now()->subDays(14)->toDateTimeString();
        $range = CarbonPeriod::create($pastSevenDays, $currentDate);
        $date = $range->toArray();
        foreach ($date as $date){
            $newDate[] = date('d-m-Y', strtotime($date));
            $sellerOnboardCount[] = DB::table('seller_master')
            ->whereDate('created_at',$date)->count();
        }
        return view('admin.dashboard',["categoryCount"=>  $categoryCount,
                                        "userCount"=>$userCount,
                                        "sellerCount"=> $sellerCount])
                                        ->with('sellerOnboardCount',json_encode($sellerOnboardCount,JSON_NUMERIC_CHECK))
                                        ->with('newDate',json_encode($newDate));
    }

    // view about us page
    public static function viewAboutUsPage(){
        $aboutUs = DB::table('business_settings')->where('type','about-us')->first();
        return view('admin.about-us',["data"=> $aboutUs]);
    }

    // view about us page
    public static function viewTermsConditionPage(){
        $termCondition = DB::table('business_settings')->where('type','terms-condition')->first();
        return view('admin.terms-condition',["data"=> $termCondition]);
    }
    // view about us page
    public static function viewPrivacyPolicyPage(){
        $privacyPolicy = DB::table('business_settings')->where('type','privacy-policy')->first();
        return view('admin.privacy-policy',["data"=> $privacyPolicy]);
    }

    //  view setting page
    public static function viewSettingPage(){
        return view('admin.setting');
    }



      //  about us page
      public static function pageCreate(Request $request,$type){
        try{
            DB::table('business_settings')->updateOrInsert(['type'=>$type],['type' => $type, 'value' => $request->editor]);
            return redirect()->back();
        }catch(Exception $e){
            dd($request->all());
        }

    }

    //  news offer page
    public static function createNewsOffer(){
        $categoryLists = DB::table('category_master')->select('id','name')->where('position',0)->get();
        return view('admin.newsFeed',["categorylists"=> $categoryLists]);

    }

    //  news offer submit
    public static function newsOfferSubmit(Request $request){
        $validated = $request->validate([
            'pincode' => 'required|numeric|digits:6',
            'category_id' => 'required',
            'news_title' => 'required',
            'description' => 'required',
            'file_type' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->except(['_token']);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $requestData['image']= $filename;
        }
        $insertNewsOffer = DB::table('news_offer')->insert($requestData);
        return redirect()->route('admin.news-offer', ['status' => 'success']);

    }

    // banner page
    public static function viewBannerPage(){
        DB::statement(DB::raw('set @rownum=0'));
        $offerList = DB::table('offer_banner')->select('offer_banner.*',DB::raw('@rownum := @rownum + 1 As rownum'))->get();
        return view('admin.banner',["offerList"=>$offerList]);
    }

    // create banner page
    public static function createBannerPage(){
        return view('admin.createBanner');
    }

    // submit create banner page
    public static function submitCreateBanner(Request $request){
        try{
            $validated = $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg',
                'offerLink' => 'required|url',
            ]);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file->move(public_path('images/offerBanner/'), $filename);
            $requestData['image']= 'images/offerBanner/'.$filename;
        }
        $requestData['url']= $request->offerLink;
        $createBanner = DB::table('offer_banner')->insert($requestData);
        if($createBanner){
        return redirect()->route('admin.banner');
        }
    } catch(Exception $e){

    }
}

    // edit banner page
    public static function editBannerPage($id){
        $offerBanner = DB::table('offer_banner')->where('id',$id)->first();
        return view('admin.editBanner',["offerBanner"=>$offerBanner]);
    }

    // submit edit banner page
    public static function submitEditBanner(Request $request){
        try{
            $validated = $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg'
            ]);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').'-'.$file->getClientOriginalName();
            $file->move(public_path('images/offerBanner/'), $filename);
            $requestData['image']= 'images/offerBanner/'.$filename;
        }
        $requestData['url']= $request->offerLink;
        $createBanner = DB::table('offer_banner')->where(['id'=>$request->id])->update($requestData);
        if($createBanner){
        return redirect()->back();
        }
        return redirect()->back();
    } catch(Exception $e){

    }
}

    // delete banner
    public static function deleteBanner($id){
        $deleteBanner = DB::table('offer_banner')->where('id',$id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    //  view subscription list
    public static function viewSubscriptionList(){
            $subscription = DB::table('subscription_plan')->get();
            $status = DB::table('subscription_plan')->select('status')->get();
            return view('admin.subscriptionList',["subscription"=>$subscription],["status"=>$status]);

    }
    //  add subscription
    public static function addSubscription(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'duration' => 'required',
                'editor' => 'required',
                ]);
            DB::table('subscription_plan')->insert(['name'=>$request->name,'description' => $request->editor,'price'=>$request->price,'duration_days'=>$request->duration]);
            return redirect()->back();
        }catch(Exception $e){
            dd($request->all());
        }

    }

    //  view edit subscription
    public static function editSubscription($id){
            $subscription=DB::table('subscription_plan')->where('id',$id)->first();
            return view('admin.editSubscription',["subscription"=>$subscription]);
    }

     //  send edit subscription data
     public static function editSubscriptionData(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'duration' => 'required',
                'editor' => 'required',
                ]);
            DB::table('subscription_plan')->where('id',$request->id)->update(['name'=>$request->name,'description' => $request->editor,'price'=>$request->price,'duration_days'=>$request->duration]);
            return redirect()->back();
        }catch(Exception $e){
            dd($request->all());
        }

    }

    //  delete subscription
    public static function deleteSubscription(Request $request){
        $data=$request->all();
        $id=$data['id'];
        $subscription=DB::table('subscription_plan')->where('id',$id)->update(['status'=>'0']);
        return response()->json(["status"=> true,"message"=>"subscription deactivated"]);
}

//  activate subscription
public static function activateSubscription(Request $request){
    $data=$request->all();
    $id=$data['id'];
    $subscription=DB::table('subscription_plan')->where('id',$id)->update(['status'=>'1']);
    return response()->json(["status"=> true,"message"=>"subscription activated"]);
}

//  view active subscribers
public static function activeSubscribers(Request $request){
    $currentDate = Carbon::now()->toDateTimeString();
    $seller = DB::table('seller_master')->join('subscription_purchased', 'seller_master.id', '=', 'subscription_purchased.seller_id')
                ->join('subscription_plan','subscription_plan.id','=','subscription_purchased.plan_id')
                ->where('subscription_purchased.period_end', '>', DB::raw('NOW()'))->get();

    return view('admin.activeSubscriber',["seller"=>$seller]);
}

}
