@extends('layouts.admin',['menu' => 'review'])
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
                                <h3>Review</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Review</li>
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
                        <h5 class="col-10">Review List</h5>
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
                                        <th>Seller Name</th>
                                        <th>User Name</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reviewLists as $reviewList)
                                        <tr>
                                    
                                            <td>{{$reviewList->user_name}}</td>
                                            <td>{{$reviewList->seller_name}}</td>
                                            <td>{{$reviewList->review_text}}</td>
                                            <td>{{$reviewList->status}}</td>
                                            <td>
                                                <div>
                                                    <i class="fa fa-edit me-2 font-success"></i>
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
                                        <th>Seller Name</th>
                                        <th>User Name</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pendingLists as $reviewList)
                                        <tr>
                                    
                                            <td>{{$reviewList->user_name}}</td>
                                            <td>{{$reviewList->seller_name}}</td>
                                            <td>{{$reviewList->review_text}}</td>
                                            <td>{{$reviewList->status}}</td>
                                            <td>
                                                <div>
                                                    <i class="fa fa-edit me-2 font-success"></i>
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
                                        <th>Seller Name</th>
                                        <th>User Name</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($approvedLists as $reviewList)
                                        <tr>
                                    
                                            <td>{{$reviewList->user_name}}</td>
                                            <td>{{$reviewList->seller_name}}</td>
                                            <td>{{$reviewList->review_text}}</td>
                                            <td>{{$reviewList->status}}</td>
                                            <td>
                                                <div>
                                                    <i class="fa fa-edit me-2 font-success"></i>
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
                                        <th>Seller Name</th>
                                        <th>User Name</th>
                                        <th>Review</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rejectedLists as $reviewList)
                                        <tr>
                                            <td>{{$reviewList->user_name}}</td>
                                            <td>{{$reviewList->seller_name}}</td>
                                            <td>{{$reviewList->review_text}}</td>
                                            <td>{{$reviewList->status}}</td>
                                            <td>
                                                <div>
                                                    <i class="fa fa-edit me-2 font-success"></i>
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
    });
    
    </script>
   
@endPush