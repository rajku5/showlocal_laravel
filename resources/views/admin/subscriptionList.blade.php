@extends('layouts.admin',['menu' => 'seller-list'])
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
        .status{
            text-align:right;
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
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Subscriptions</li>
                            </ol>
                        </div>
                        <div class="card">
                            <div class="card-header row">
                                <h5 class="col-8">Subscription Plans</h5>
                                    <div class=" col-2 pull-right">
                                        <a href="{{route('admin.active-subscriber')}}" class="btn btn-secondary">Active Subscribers</a>
                                    </div>
                                    <div class=" col-2 pull-right">
                                        <a href="{{route('admin.add-subscription')}}" class="btn btn-secondary">Add Subscription</a>
                                    </div>
                            </div>
                        </div>
                        
                        @foreach ($subscription as $key => $data)
                        <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card plans">
                        @if($data->status=='1')
                        <h4 style="color:green;" class="status">Active</h4>
                        @else
                        <h4 style="color:red;" class="status">Inactive</h4>
                        @endif
                        <h2 class="mt-3"><b><center>{{$data->name}}</center></b></h2>
                                    <h3><center>Rs. {{$data->price}}</center></h3>
                                    <h4><center>for {{$data->duration_days}} days</center></h4>
                                    <div class="points">{!! $data->description ?? ''  !!}</div>
                                    <a href={{route('admin.edit-subscription',['id'=>$data->id])}} class="btn btn-secondary mt-4">Edit Subscription</a>
                                    @if($data->status=='1')
                                    <div class="btn btn-secondary mt-2" onclick="delete_subscription({{$data->id}})">Delete Subscription</div>
                                    @else
                                    <div class="btn btn-secondary mt-2" onclick="activate_subscription({{$data->id}})">Activate Subscription</div>
                                    @endif
                        </div>
                        </div>
                        @endforeach
                        
                </div>
</div>
@endSection
<script type="text/javascript">
    function delete_subscription(id){
        var inactivate=confirm("Do you want to delete this subscription ?");
        if(inactivate==true){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'delete-subscription',
                data:{
                    id:id
                    
                },success:function(response){
                    window.location.reload();
                    console.log(response);
                    }
                
            });
        }
    }
    function activate_subscription(id){
        var activate=confirm("Do you want to activate this subscription ?");
        if(activate==true){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: 'activate-subscription',
                data:{
                    id:id
                    
                },success:function(response){
                    window.location.reload();
                    console.log(response);
                    }
                
            });
        }
    }
    
            </script>