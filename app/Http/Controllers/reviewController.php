<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
//use DB;
use Illuminate\Support\Facades\DB;

class reviewController extends Controller
{
    // get review list
    public static function getReviewList(){
        $reviewList = DB::table('review_master')
                    ->join('users','users.id','user_id')
                    ->join('seller_master','seller_master.id','seller_id')
                    ->select( DB::raw('CONCAT(users.first_name, users.last_name) AS user_name'),  DB::raw('CONCAT(seller_master.first_name, seller_master.last_name) AS seller_name'),'review_master.*')
                    ->where('review_master.is_active',1)->get();
        $pendingList = collect($reviewList)->where('status',0)->where('is_active',1)->all();
        $approvedList = collect($reviewList)->where('status',1)->where('is_active',1)->all();
        $rejectedList = collect($reviewList)->where('status',2)->where('is_active',1)->all();
        $reviewList = self::addStatus( $reviewList);
        $pendingList = self::addStatus( $pendingList);
        $approvedList = self::addStatus( $approvedList);
        $rejectedList = self::addStatus( $rejectedList);
        return view('admin.reviewList',["reviewLists"=>$reviewList,
                                        "pendingLists"=> $pendingList,
                                        "approvedLists"=> $approvedList,
                                        "rejectedLists"=> $rejectedList]);
    }

    public static function addStatus($data){
        $data = collect($data)->map(function($item,$key){
             $statusList = ['pending','Approved','Rejected'];
             $item->status  = $statusList[(int)$item->status];
             return $item;
         });
         return $data;
    }

    // add review function
    public static function addReview(Request $request){
        try{
            $reviewStatus = DB::table('review_master')->insert($request->all());
            return response()->json(["status"=> true,"message"=>"Review Added"],200);
        }catch(Exception $e){
            return response()->json(["status"=> false,"message"=>"something went wrong.."],500);
        }
    }

        public static function getUserReviewList(Request $request,$id){
                $reviewList = DB::table('review_master')
                                ->join('seller_master','seller_master.id','review_master.seller_id')
                                ->select('seller_master.id as seller_id','thumbnil_image as shop_image','store_name as shop_name','contact_number as shop_number','seller_master.latitude as latitude','seller_master.longitude as longitude','review_text','rate')
                                ->where('review_master.user_id',$id)
                                ->get();
                  $reviewList = collect($reviewList)->map(function($value) {
                 if(isset($value->shop_image)){
                        $value->shop_image = env('APP_URL').'/images/'.$value->shop_image;
                    };
                    return $value ;
                });
                $reviewListData = DB::table('review_master')->select('review_text','rate')->get();
                $reviewList = collect($reviewList)->map(function ($item, $key) use($reviewListData) {
                    $average=collect($reviewListData)->where('seller_id',$item->seller_id)->avg('rate');
                    $total=collect($reviewListData)->where('seller_id',$item->seller_id)->count('rate');
                    $item->total_review =  $total;
                    $item->rating=round($average,1);
                    return $item ;
                });
                        return  response()->json(['data'=>$reviewList]);
    }

}
