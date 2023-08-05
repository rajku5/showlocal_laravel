@extends('layouts.admin',['menu' => 'news_offer'])
@section('content')
  <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>News Offer</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">News Offer</li>
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
                    <form action="{{ route('admin.news-offer-submit') }}" method="POST" class="needs-validation user-add"
                        novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="card tab2-card">
                            <div class="card-body">
                                <h4>News Offer :-</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom0"><span>*</span>Enter Pincode</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom0" type="number" name="pincode" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom0"><span>*</span>News Category</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                    <select class="custom-select form-control " required="" name="category_id">
                                            <option value="">--Select--</option>
                                            @foreach ($categorylists as $categorylist)
                                                <option value={{ $categorylist->id }}>{{ $categorylist->name }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>News Title</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="text" name="news_title"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span>Description</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message" name="description" style="height: 150px"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2" ><span>*</span>File upload type</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                    <label for="chkImage">
                                    <input type="radio" id="chkImage" name="file_type" value="image" onclick="ShowHideDivImg()" />
                                    Image
                                    </label>
                                    <label for="chkVideo">
                                    <input type="radio" id="chkVideo" name="file_type" value="video" onclick="ShowHideDivVideo()" />
                                    Video
                                    </label>
                                    </div>
                                </div>
                                <div class="form-group row" id="inputImage" style="display:none">
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="file" name="image"
                                            required style="margin-left:17rem">
                                    </div>
                                </div>
                                <div class="form-group row" id="inputVideo" style="display:none">
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="text" name="video_url"
                                            required placeholder="URL" style="margin-left:17rem">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2" ><span>*</span>Status</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                    <input type="checkbox" id="vehicle1" name="status" value="1">
                                    <label for="active">Active</label>
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
                        <div class="pull-right"><button type="submit" class="btn btn-primary">Submit </button></div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Container-fluid Ends-->
    </div>
@endSection
@push('script')
<script type="text/javascript">
    function ShowHideDivImg(){
        var chkImage = document.getElementById("chkImage");
            var inputImage = document.getElementById("inputImage");
            inputImage.style.display = chkImage.checked ? "block" : "none";
            $('#inputVideo').hide();
    }
    function ShowHideDivVideo(){
        var chkVideo = document.getElementById("chkVideo");
            var inputVideo = document.getElementById("inputVideo");
            inputVideo.style.display = chkVideo.checked ? "block" : "none";
            $('#inputImage').hide();
    }
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const status = urlParams.get('status');
        if(status){
            alert('News has been subitted successfully');
            location.replace("{{route('admin.news-offer')}}");
        }
</script>
@endpush