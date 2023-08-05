@extends('layouts.admin', ['menu' => 'create-seller'])
@push('css')
@endPush

@section('content')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>Create Banner</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Create Banner </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ route('admin.submit.create-banner') }}" method="POST" class="needs-validation user-add" enctype="multipart/form-data"
                        novalidate="">
                        @csrf
                      <div class="card tab2-card">
                            <div class="card-body">
                                <h4>Image :-</h4>
                                <div class="form-group row">
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto"><span>*</span>Image :-</label>
                                           <div class='col-8'>
                                            <input class="form-control" type="file" id="image1" name="image"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="card tab2-card">
                            <div class="card-body">
                                <h4>Offer Link :-</h4>
                                  <div class="form-group row">
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto"><span>*</span>Link :-</label>
                                           <div class='col-8'>
                                            <input class="form-control " type="text" id="offer1" name="offerLink"/>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="pull-right"><button type="submit" class="btn btn-primary">Add </button></div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Container-fluid Ends-->
    </div>
@endSection

@push('script')
{{-- <script>
    function readURL(input,displayId) {
           
            for( var i = 0; i<input.files.length; i++)
            {
                if (input.files && input.files[i]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#'+displayId).attr('src',e.target.result);
                        $('#'+displayId).attr('width',200);
                        $('#'+displayId).attr('height',200);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
         }
 $("#image1").change(function () {
        readURL(this,'image1-view');
    });
</script> --}}
@endPush
