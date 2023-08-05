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
                                <h3>Banner</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item active">Banner</li>
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
                        <h5 class="col-10">Banner List</h5>
                        <div class=" col-2 pull-right">
                            <a href="{{route('admin.create-banner')}}" class="btn btn-secondary">Create Banner</a>
                        </div>
                    </div>
                    <div class="card-body vendor-table">
                    
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab">
                                <table class="display" id="all-section">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Image</th>
                                        <th>URL</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($offerList as $offerList)
                                    <tr>
                                        <td>{{$offerList->rownum}}</td>
                                        <td>@if ($offerList->image)
                                            <div class="item"><img class="img-fluid"
                                                src="{{ env('APP_URL').'/'. $offerList->image }}" alt="banner image"/></div>
                                            @endif</td>
                                        <td>{{$offerList->url}}</td>
                                        <td>
                                            <div>
                                                <a href={{route('admin.edit-banner',['id'=>$offerList->id])}}><i class="fa fa-edit font-default"></i></a><i class="fa fa-trash-o" onclick="deleteBanner({{$offerList->id}})" style="margin-top:4px;font-size:16px;float:right;color:red;cursor:pointer "></i>
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
    function deleteBanner(id){
        console.log(id);
        var response = confirm("Do you want to delete this banner ?");
        if(response==true){
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        $.ajax({
            url: "delete-banner/"+id,
            type: 'POST',
            data:{
                    id:id,
            },
            success: function(){
                window.location.reload(true);
            }
        });
    } 
    }
    </script>
   
@endPush