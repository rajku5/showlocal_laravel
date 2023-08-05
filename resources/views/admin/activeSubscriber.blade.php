@extends('layouts.admin',['menu' => 'subscriptions'])
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
                                <h3>Subscribers</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Subscriptions</li>
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
                        <h5 class="col-10">Subscriber List</h5>
                    </div>
                    <div class="card-body vendor-table">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <table class="display" id="all-section">
                                    <thead>
                                    <tr>
                                        <th>Seller Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Active Plan</th>
                                        <th>Purchased On</th>
                                        <th>Expiring On</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($seller as $seller)
                                        <tr>
                                    
                                            <td>{{$seller->first_name.' '.$seller->last_name}}</td>
                                            <td>{{ $seller->contact_number}}</td>
                                            <td>{{ $seller->email}}</td>
                                            <td>{{ $seller->name}}</td>
                                            <td>{{date('d-M-y', strtotime($seller->period_start))}}</td>
                                            <td>{{date('d-M-y', strtotime($seller->period_end))}}</td>
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