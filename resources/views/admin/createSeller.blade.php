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
                            <h3>Create Seller</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Seller List </li>
                            <li class="breadcrumb-item active">Create Seller </li>
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
                    <form action="{{ route('admin.create.seller') }}" method="POST" class="needs-validation user-add" enctype="multipart/form-data"
                        novalidate="">
                        @csrf
                        <div class="card tab2-card">

                            <div class="card-body">

                                <h4>Account Details :-</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom0"><span>*</span> First Name</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom0" type="text" name="first_name">
                                        @error('first_name')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span> Last Name</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="text" name="last_name"
                                            required="">
                                        @error('last_name')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> Email</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="text" name="email"
                                            required="">
                                        @error('email')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span>Mobile</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="number" name="contact_number"
                                            required="">
                                        @error('contact_number')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span>Whatsapp Number</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="number" name="whatsapp_number"
                                            required="">
                                        @error('whatsapp_number')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span>Weight</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="number" name="weight"
                                            required="">
                                        @error('weight')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> Store Name</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="text" name="store_name"
                                            required="">
                                        @error('store_name')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> Address</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="text" name="address"
                                            required="">
                                        @error('address')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> State</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="text" name="state"
                                            required="">
                                        @error('state')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> City</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="text" name="city"
                                            required="">
                                        @error('city')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> Thumbnil Image :-</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="file" name="thumbnil_image"
                                            required="">
                                        @error('thumbnil_image')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                        
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span>Youtube </label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="youtube" value=""
                                                required>
                                            @error('youtube')
                                            <div class="alert alert-danger wrong">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="card tab2-card">

                            <div class="card-body">

                                <h4>Location Details:-</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom0"><span>*</span>Latitude</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom0" type="text" name="latitude"
                                            required="">
                                        @error('latitude')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1"><span>*</span>Longitude</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom1" type="text"
                                            name="longitude" required="">
                                        @error('longitude')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span> Website</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control " id="validationCustom2" type="text"
                                            name="website" required="">
                                        @error('website')
                                        <div class="alert alert-danger wrong">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card tab2-card">

                            <div class="card-body">

                                <h4>Category Details:-</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label>Category</label>
                                    </div>
                                    <div class="col-md-7">
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
                                        <label>Sub Category</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="custom-select form-control " required=""
                                            name="sub_category_id">
                                            <option value="">--Select--</option>
                                            @foreach ($subcategoryLists as $subcategoryList)
                                                <option value={{ $subcategoryList->id }}>{{ $subcategoryList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label>Sub Sub Category</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="custom-select form-control " required=""
                                            name="sub_sub_category_id">
                                            <option value="">--Select--</option>
                                            @foreach ($subsubcategoryLists as $subsubcategoryLists)
                                                <option value={{ $subsubcategoryLists->id }}>
                                                    {{ $subsubcategoryLists->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                      <div class="card tab2-card">
                            <div class="card-body">
                                <h4>Images :-</h4>
                                <div class="form-group row">
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Image 1:-</label>
                                           <div class='col-8'>
                                            <input class="form-control" type="file" id="image1" name="image1"/>
                                        </div>
                                    </div>
                                    <div class="col-12 my-2 row">
                                         <label class="col-2 my-auto">Image 2:-</label>
                                        <div class='col-8'>
                                            <input class="form-control" type="file" id="image2" name="image2"/>
                                        </div>
                                 
                                    </div>
                                    <div class="col-12 my-2 row">
                                         <label class="col-2 my-auto">Image 3:-</label>
                                         <div class='col-8'>
                                            <input class="form-control " type="file" id="image3" name="image3"/>
                                        </div>
                                   
                                    </div>
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Image 4:-</label>
                                        <div class='col-8'>
                                            <input class="form-control" type="file" id="image4" name="image4"/>
                                        </div>
                                   
                                    </div>
                                    <div class="col-12 my-2 row">
                                         <label class="col-2 my-auto">Image 5:-</label>
                                        <div class='col-8'>
                                            <input class="form-control " type="file"  id="image5" name="image5"/>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="card tab2-card">
                            <div class="card-body">
                                <h4>Offer :-</h4>
                                  <div class="form-group row">
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Offer 1:-</label>
                                           <div class='col-8'>
                                            <input class="form-control " type="file" id="offer1" name="offer1"/>
                                        </div>
 
                                    </div>
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Offer 2:-</label>
                                        <div class='col-8'>
                                        <input class="form-control " type="file" id="offer2" name="offer2"/>
                                        </div>
                                     
                                    </div>
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Offer 3:-</label>
                                        <div class= 'col-8'>
                                        <input class="form-control " type="file" id="offer3" name="offer3"/>
                                        </div>
                                       
                                    </div>
                                    <div class="col-12 my-2 row">
                                        <label class="col-2 my-auto">Offer 4:-</label>
                                        <div class='col-8'>
                                        <input class="form-control" type="file" id="offer4" name="offer4"/>
                                        </div>
                                         
                                    </div>
                                    <div class="col-12 my-2 row">
                                         <label class="col-2 my-auto">Offer 5:-</label>
                                        <div class='col-8'>
                                        <input class="form-control " type="file"  id="offer5" name="offer5"/>
                                        </div>
                                     
                                    </div>
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
