@extends('layouts.admin', ['menu' => 'edit-seller'])
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
                            <h3>Edit Seller</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Seller List </li>
                            <li class="breadcrumb-item active">Edit Seller </li>
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
                    <form action="{{route('admin.edit.seller')}}" method="POST" class="needs-validation user-add" novalidate="" enctype="multipart/form-data">
                        @csrf
                    <div class="card tab2-card">
                            <div class="card-body">
                                    <h4>Account Details</h4>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom0"><span>*</span> First Name</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom0" type="text" name="first_name" value="{{@$sellerDetail->first_name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom1"><span>*</span> Last Name</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom1" type="text" name="last_name"  value="{{@$sellerDetail->last_name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span> Email</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="email" value="{{@$sellerDetail->email}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span>Contact Number</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="number" name="contact_number" value="{{@$sellerDetail->contact_number}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span>Whatapp Number</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="number" name="whatsapp_number" value="{{@$sellerDetail->whatsapp_number}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2">Weight</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="number" name="weight" value="{{@$sellerDetail->weight}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span> Store Name</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="store_name" value="{{@$sellerDetail->store_name}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span> Address</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="address" value="{{@$sellerDetail->address}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span> State</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="state" value="{{$sellerDetail->state}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span> City</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="city" value="{{$sellerDetail->city}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2"><span>*</span> Status</label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <select class="custom-select form-control col-12" required name="status">
                                                <option value="">--Select--</option>
                                                @foreach ($statusLists as $key =>$statusList)
                                                
                                                    <option value="{{$key}}" @if($key == $sellerDetail->status) selected @else "" @endif>{{$statusList}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3 ">
                                            <label for="validationCustom2"><span>*</span> Thumbnil Image :-</label>
                                        </div>
                                        <div class={{isset($sellerDetail->thumbnil_image) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control col-10" id="validationCustom2" type="file" name="thumbnil_image" >
                                        </div>
                                        @if(isset($sellerDetail->thumbnil_image))
                                            <label class="col-2"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->thumbnil_image}} " target="_blank">Preview</a></label>
                                        @endif
                                    </div>
                                        <div class="form-group row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="validationCustom2">Youtube </label>
                                        </div>
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="Youtube" value="{{@$sellerDetail->youtube}}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row d-none">
                                        <div class="col-xl-8 col-md-7">
                                            <input class="form-control col-12" id="validationCustom2" type="text" name="id" value="{{$sellerDetail->id}}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         <div class="card tab2-card">
                            <div class="card-body">
                        

                                <h4>Location Details</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom0">Latitude</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control col-12" id="validationCustom0" type="text" name="latitude" value="{{@$sellerDetail->latitude}}"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom1">Longitude</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control col-12" id="validationCustom1" type="text" name="longitude" value="{{@$sellerDetail->longitude}}"
                                            name="longitude" required>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label for="validationCustom2"><span>*</span>Website</label>
                                    </div>
                                    <div class="col-xl-8 col-md-7">
                                        <input class="form-control col-12" id="validationCustom2" type="text" name="website" value="{{@$sellerDetail->website}}"
                                            name="website" required>
                                    </div>
                                </div>

                                <h4>Category Details</h4>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label>Category</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="custom-select form-control col-12" required name="category_id">
                                            <option value="">--Select--</option>
                                            @foreach ($categorylists as $categorylist)
                                                 <option value="{{$categorylist->id }}" @if($categorylist->id == $sellerDetail->category_id) selected @else "" @endif>{{$categorylist->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label>Sub Category</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="custom-select form-control col-12" required name="sub_category_id">
                                             <option value="">--Select--</option>
                                            @foreach ($subcategoryLists as $subcategoryList)
                                                 <option value={{$subcategoryList->id }} @if($subcategoryList->id == $sellerDetail->sub_category_id) selected @else "" @endif>{{$subcategoryList->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-xl-3 col-md-4">
                                        <label>Sub Sub Category</label>
                                    </div>
                                    <div class="col-md-7">
                                        <select class="custom-select form-control col-12" required name="sub_sub_category_id">
                                            <option value="">--Select--</option>
                                                @foreach ($subsubcategoryLists as $subsubcategoryLists)
                                                 <option value={{$subsubcategoryLists->id }} @if($subsubcategoryLists->id == $sellerDetail->sub_sub_category_id) selected @else "" @endif>{{$subsubcategoryLists->name }}</option>
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
                                        {{-- <img id="image1-view" >                 --}}
                                        <div class={{isset($sellerDetail->image1) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control" type="file" id="image1" name="image1"/>
                                        </div>
                                        @if(isset($sellerDetail->image1))
                                        <div class="col-4 my-auto">
                                              <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->image1}} " target="_blank">Preview</a></label>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image2" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Image 2:-</label>
                                        <div class={{isset($sellerDetail->image2) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control" type="file" id="image2" name="image2"/>
                                        </div>
                                        @if(isset($sellerDetail->image2))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->image2}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image3" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Image 3:-</label>
                                         <div class={{isset($sellerDetail->image3) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control " type="file" id="image3" name="image3"/>
                                        </div>
                                          @if(isset($sellerDetail->image3))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->image3}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image4" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Image 4:-</label>
                                        <div class={{isset($sellerDetail->image4) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control" type="file" id="image4" name="image4"/>
                                        </div>
                                          @if(isset($sellerDetail->image4))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->image4}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image5" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Image 5:-</label>
                                        <div class={{isset($sellerDetail->image5) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control " type="file"  id="image5" name="image5"/>
                                        </div>
                                          @if(isset($sellerDetail->image5))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->image5}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
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
                                        {{-- <img id="image1-view" >                 --}}
                                        <div class={{isset($sellerDetail->offer1) ? 'col-6' : 'col-8'}}>
                                            <input class="form-control " type="file" id="offer1" name="offer1"/>
                                        </div>
                                           @if(isset($sellerDetail->offer1))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->offer1}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image2" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Offer 2:-</label>
                                        <div class={{isset($sellerDetail->offer2) ? 'col-6' : 'col-8'}}>
                                        <input class="form-control " type="file" id="offer2" name="offer2"/>
                                        </div>
                                           @if(isset($sellerDetail->offer2))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->offer2}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image3" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Offer 3:-</label>
                                        <div class={{isset($sellerDetail->offer3) ? 'col-6' : 'col-8'}}>
                                        <input class="form-control " type="file" id="offer3" name="offer3"/>
                                        </div>
                                           @if(isset($sellerDetail->offer3))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->offer3}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image4" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Offer 4:-</label>
                                        <div class={{isset($sellerDetail->offer4) ? 'col-6' : 'col-8'}}>
                                        <input class="form-control" type="file" id="offer4" name="offer4"/>
                                        </div>
                                           @if(isset($sellerDetail->offer4))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->offer4}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2 row">
                                        {{-- <img width="200" height="200" id="image5" src="{{URL::to('/') }}/storage/registration/{{$sellerDetails->pan_card_document}}">                 --}}
                                        <label class="col-2 my-auto">Offer 5:-</label>
                                        <div class={{isset($sellerDetail->offer5) ? 'col-6' : 'col-8'}}>
                                        <input class="form-control " type="file"  id="offer5" name="offer5"/>
                                        </div>
                                           @if(isset($sellerDetail->offer5))
                                            <div class="col-4 my-auto">
                                                <label class="col-3"> <a href="{{ URL::to('/') }}/images/{{$sellerDetail->offer5}} " target="_blank">Preview</a></label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
                 <div class="pull-right"><button type="submit" class="btn btn-primary">Update Seller </button></div>
                </form>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    </div>
@endSection

@push('script')
@endPush
