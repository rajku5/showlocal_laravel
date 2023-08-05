<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Payment;
//use Session;
use Exception;
//use DB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\Session\Session as SessionSession;

class RazorpayPaymentController extends Controller
{
    public function index($price)
    {
        return view('seller.razorpayView',['price'=>$price]);
    }

    public function store(Request $request,$plan_id)
    {
        $input = $request->all();
        //$plan_id = $input['id'];
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        try{
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        } catch(Exception $e){
            return redirect()->back();
        }
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        Session::put('success', 'Payment successful');
        $seller_id = session()->get('seller_id');
        if(DB::table('subscription_purchased')->where('seller_id',$seller_id)->exists()){
            $duration = DB::table('subscription_plan')->where('id',$plan_id)->select('duration_days')->first();
            $subscription = DB::table('subscription_purchased')->where('seller_id',$seller_id)->first();
            $period_start = $subscription->period_end;
            $period_end = Carbon::parse($subscription->period_end)->addDays($duration->duration_days);
            DB::table('subscription_purchased')->insert([
                "seller_id"=>$seller_id,
                "plan_id"=>$plan_id,
                "period_start"=>$period_start,
                "period_end"=>$period_end]);
            $payment=DB::table('payment_gateway')->insert([
                    "request_data"=>$input['razorpay_payment_id'],
                    "response_data"=>"success",
                    "seller_id"=>$seller_id]);
            return redirect()->back();
        } else{
        $period_start = Carbon::now();
        $duration = DB::table('subscription_plan')->where('id',$plan_id)->select('duration_days')->first();
        $period_end = Carbon::now()->addDays($duration->duration_days);
        $subscription =  DB::table('subscription_purchased')->insert([
        "seller_id"=>$seller_id,
        "plan_id"=>$plan_id,
        "period_start"=>$period_start,
        "period_end"=>$period_end]);
        $payment=DB::table('payment_gateway')->insert([
            "request_data"=>$input['razorpay_payment_id'],
            "response_data"=>"success",
            "seller_id"=>$seller_id]);
        //return response()->json(["status"=> true,"message"=>"subscription added","request_data"=>$input,"response_data"=>$response]);
        return redirect()->back();
        }
    }
}
