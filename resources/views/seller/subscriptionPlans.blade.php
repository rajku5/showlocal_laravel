@extends('layouts.seller',['menu' => 'subscriptions'])
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/datatables.css')}}">
    <style>
        .plans{
            padding:3rem;
        }
        .points li{
            display: list-item !important;
            display: block;
            list-style-type: disc !important;
        }
        .razorpay-payment-button{
            background-color:#314da7;
            color: white;
            padding:0.5rem 1.5rem;
            margin-top:1.5rem;
            font-size:14px;
            border-radius:5px;
            letter-spacing:1px;
            border:none;
            vertical-align:middle;
            text-align:center;
            width:270px;
        }
        .razorpay-payment-button:hover{
            background-color:#253b80;
        }
        .status{
            text-align:right;
            color:green;
        }
    </style>
@endPush
@section('content')
<div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Subscriptions</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Subscriptions</li>
                            </ol>
                        </div>
                        <div class="card">
                            <div class="card-header row">
                                <h5 class="col-10">Subscription Plans</h5>
                                    
                            </div>
                        </div>
                        
                        @foreach ($subscription as $key => $data)
                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card plans">
                        @if(DB::table('subscription_purchased')->where('seller_id',$seller_id)->where('plan_id',$data->id)->exists())
                        <h4 class="status">Active</h4>
                        @endif
                        <h2 class="mt-3"><b><center>{{$data->name}}</center></b></h2>
                                    <h3><center>Rs. {{$data->price}}</center></h3>
                                    <h4><center>for {{$data->duration_days}} days</center></h4>
                                    <div class="points">{!! $data->description ?? ''  !!}</div>
                                    <!--onclick="purchase_subscription({{$data->id}})-->
                                    <form style="text-align:center" action="razorpay-payment/{{$data->id}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{$data->id}}">
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-id="{{$data->id}}"
                                            data-amount={{round($data->price).'00'}}
                                            data-buttontext="Pay {{$data->price}} INR"
                                            data-name="Showlocal.in"
                                            data-description="Rozerpay"
                                            data-image="https://laraveltuts.com/wp-content/uploads/2022/08/laraveltuts-rounde-logo.png"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-theme.color="#ff7529"
                                            data-handler: function (response){
                                                        console.log(response);
                                                    }>
                                    </script>
                                    </form>
                                    <!--<a href="razorpay-payment/{{$data->price}}" class="btn btn-secondary mt-4">BUY NOW</a>-->
                        </div>
                        </div>
                        @endforeach
                        
                </div>
</div>
@endSection
<script type="text/javascript">
    function purchase_subscription(id){
        var purchase=confirm("Do you want to purchase this subscription ?");
        if(purchase==true){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'purchase-subscription',
                data:{
                    id:id
                    
                },success:function(response){
                    alert(response['message']);
                    }
                
            });
        }
    }
</script>