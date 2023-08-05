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
                            <h3>Edit Banner</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Edit Banner </li>
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
                    <form action="{{ route('admin.submit.edit-banner') }}" method="POST" class="needs-validation user-add" enctype="multipart/form-data"
                        novalidate="">
                        @csrf
                        <input class="form-control" type="hidden" id="image1" name="id" value="{{$offerBanner->id}}"/>
                      <div class="card tab2-card">
                            <div class="card-body">
                                <h4>Image :-</h4>
                                <div class="form-group row">
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Image :-</label>
                                           <!-- <div class='col-8'>
                                            <input class="form-control" type="file" id="image1" name="image"/>
                                        </div> -->
                                        <!-- <div class={{isset($offerBanner->image) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control col-10" id="validationCustom2" type="file" name="image" >
                                        </div> -->
                                        @if(isset($offerBanner->image))
                                            <img class="img-fluid col-2 pt-2" src="{{ URL::to('/') }}/{{$offerBanner->image}}">
                                            <div class="col-4 pt-2">{{$offerBanner->image}}</div>
                                            <!--<div class="col-2 pt-2"> <a href="{{ URL::to('/') }}/{{$offerBanner->image}} " target="_blank">Preview</a></div>-->
                                            <div class="col-2 pt-2"> <a href="#" onclick=showHiddenDiv() class="btn btn-primary">Change</a></div>
                                            <div class="form-group row" id="inputOfferImage" style="display:none">
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control mt-5" id="validationCustom1" type="file" name="image"
                                            required style="margin-left:10rem">
                                    </div>
                                </div>
                                            <script>
                                                function showHiddenDiv(){
                                                    var inputOfferImage = document.getElementById("inputOfferImage");
                                                    inputOfferImage.style.display = "block";
                                                }
                                            </script>
                                        @endif
                                    </div> 
                                    
                                </div>
                            </div>
                        </div>
                          <div class="card tab2-card">
                            <div class="card-body">
                                <h4>Offer Link :-</h4>
                                  <div class="form-group row">
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Link :-</label>
                                           <div class='col-8'>
                                            <input class="form-control " type="text" id="offer1" name="offerLink" value="{{$offerBanner->url}}"/>
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
                        <div class="pull-right"><button type="submit" class="btn btn-primary">Update </button></div>
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
