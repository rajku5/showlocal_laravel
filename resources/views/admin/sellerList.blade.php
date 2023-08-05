@extends('layouts.admin',['menu' => 'seller-list'])
@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('storage/admin/css/datatables.css')}}">
@endPush

@section('content')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="page-header-left">
                                <h3>Seller</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Seller</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
 <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header row">
                        <h5 class="col-10">Seller List</h5>
                        <div class=" col-2 pull-right">
                            <a href="{{route('admin.view.create.seller')}}" class="btn btn-secondary">Create Seller</a>
                        </div>
                    </div>
                    <div class="card-body vendor-table">
                    
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active show" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true" data-original-title="" title="">All</a></li>
                                        <li class="nav-item"><a class="nav-link" id="pending-tabs" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false" data-original-title="" title="">Pending</a></li>
                                        <li class="nav-item"><a class="nav-link" id="approved-tabs" data-bs-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false" data-original-title="" title="">Approved</a></li>
                                        <li class="nav-item"><a class="nav-link" id="rejected-tabs" data-bs-toggle="tab" href="#rejected" role="tab" aria-controls="rejected" aria-selected="false" data-original-title="" title="">Rejected</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <table class="display" id="all-section">
                                    <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th>Store Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sellerLists as $sellerList)
                                        <tr>
                                    
                                            <td>{{$sellerList->first_name.' '.$sellerList->last_name}}</td>
                                            <td>{{ $sellerList->store_name}}</td>
                                            <td>{{ $sellerList->state}}</td>
                                            <td>{{ $sellerList->city}}</td>
                                            <td>{{ $sellerList->status}}</td>

                                            <td>
                                                <div>
                                                    <a href={{route('admin.view.edit.seller',['id'=>$sellerList->id])}}><i class="fa fa-edit font-default"></i></a><i class="fa fa-trash-o" onclick="displayMessage({{$sellerList->id}})" style="margin-top:4px;font-size:16px;float:right;color:red;cursor:pointer "></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tabs">    
                             <table class="display" id="pending-section">
                                    <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th>Store Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pendingLists as $sellerList)
                                        <tr>
                                    
                                            <td>{{$sellerList->first_name.' '.$sellerList->last_name}}</td>
                                            <td>{{ $sellerList->store_name}}</td>
                                            <td>{{ $sellerList->state}}</td>
                                            <td>{{ $sellerList->city}}</td>
                                            <td>
                                                 <div>
                                                    <a href={{route('admin.view.edit.seller',['id'=>$sellerList->id])}}><i class="fa fa-edit font-default"></i></a><i class="fa fa-trash-o" onclick="displayMessage({{$sellerList->id}})" style="margin-top:4px;font-size:16px;float:right;color:red;cursor:pointer "></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="approved" role="tabpanel" aria-labelledby="approved-tabs">    
                              <table class="display" id="approved-section">
                                    <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th>Store Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($approvedLists as $sellerList)
                                        <tr>
                                    
                                            <td>{{$sellerList->first_name.' '.$sellerList->last_name}}</td>
                                            <td>{{ $sellerList->store_name}}</td>
                                            <td>{{ $sellerList->state}}</td>
                                            <td>{{ $sellerList->city}}</td>
                                            <td>
                                                <div>
                                                    <a href={{route('admin.view.edit.seller',['id'=>$sellerList->id])}}><i class="fa fa-edit font-default"></i></a><i class="fa fa-trash-o" onclick="displayMessage({{$sellerList->id}})" style="margin-top:4px;font-size:16px;float:right;color:red;cursor:pointer "></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                              <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tabs">    
                                <table class="display" id="rejected-section">
                                    <thead>
                                    <tr>
                                        <th>Seller</th>
                                        <th>Store Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rejectedLists as $sellerList)
                                        <tr>
                                    
                                            <td>{{$sellerList->first_name.' '.$sellerList->last_name}}</td>
                                            <td>{{ $sellerList->store_name}}</td>
                                            <td>{{ $sellerList->state}}</td>
                                            <td>{{ $sellerList->city}}</td>
                                            <td>
                                                 <div>
                                                    <a href={{route('admin.view.edit.seller',['id'=>$sellerList->id])}}><i class="fa fa-edit font-default"></i></a><i class="fa fa-trash-o" onclick="displayMessage({{$sellerList->id}})" style="margin-top:4px;font-size:16px;float:right;color:red;cursor:pointer "></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
@endSection
@push('script')

    <script src="{{asset('storage/admin/js/datatables/jquery.dataTables.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('#all-section').DataTable();
        $('#pending-section').DataTable();
        $('#approved-section').DataTable();
        $('#rejected-section').DataTable();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const status = urlParams.get('status');
        if(status){
            alert('Seller has been created successfully');
        }
    });
    function displayMessage(id){
        console.log(id);
        var r=confirm("Do you want to delete this seller ?");
        if(r==true){
        window.location.href="delete-seller/"+id;
        } else{
            window.location.href="seller-list";
        }
    }
    </script>
   
@endPush