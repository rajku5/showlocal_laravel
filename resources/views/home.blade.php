@extends('layouts.app',['menu' => 'home'])

@section('content')
   <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5 header">
                    <h1 class="display-5 animated fadeIn mb-4">Find <span class="text-primary">What's</span> Near to You</h1>
                    <h5 class="animated fadeIn mb-4 pb-2">Check Local Stores/Offers/Businesses/Services Near You</h5>
                    <h5 class="animated fadeIn mb-4 pb-2">Search from the comfort of your couch before you venture out</h5>
                    <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Start Searching</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{asset('img/banner-1.png')}}" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{asset('img/banner-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="{{ route('user.search') }}" method="POST">
                @csrf
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <select class="form-select border-0 py-3" name="category_type">
                                    <option selected>Select Category</option>
                                    @foreach ($categoryLists as $categoryList)
                                    
                                        <option value="{{$categoryList->id}}">{{$categoryList->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="search_text" class="form-control border-0 py-3" placeholder="Search Keyword">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100 py-3" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->


        <!-- Category Start -->

        @foreach ($categoryLists as $categoryList)
            @if(count($categoryList->subCategory) > 0)
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="mb-3">{{$categoryList->name}}</h1>
                    </div>
                    <div class="row g-4">
                    @foreach ($categoryList->subCategory as $subcategory)
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a class="cat-item d-block bg-light text-center rounded p-3" href={{ count($subcategory->subsubCategoryData) > 0 ? route('view.subCategory',['id'=>$subcategory->id]) :  route('view.seller.list',['id'=>$subcategory->id]) }}>
                                <div class="rounded ">
                                    <div class=" mb-2">
                                        <img class="img-fluid" src="{{ asset($subcategory->image)}}" alt="Icon">
                                    </div>
                                    <h6>{{$subcategory->name}}</h6>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
            @endIf
        @endforeach
        <!-- Category End -->

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our User's Say!</h1>
                    <!-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> -->
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Do you want to List your Shop?</h1>
                                    <!-- <h5>Click Below</h5> -->
                                     <h6 class="mb-4">It is as easy and Simple</h6>
                        <p><i class="fa fa-check text-primary me-3"></i>Fill the Seller Register form</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Showlocal Team will Contact</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Shop is active!</p>
                                </div>
                                <a href="{{route('SellerRegistration')}}" class="btn btn-primary py-3 px-4 me-2"><i class=""></i>Register Shop</a>
                               <!--  <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->

        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Explore your Near by our Android App</h1>
                                     <p class="mb-4">Just a Click Away</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Click on the Link</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Download from Playstore</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Use same login credentials</p>
                                    <!-- <h5>Click Below</h5> -->
                                </div>
                                <a href="https://play.google.com/store/apps/details?id=in.showlocal" class="btn btn-primary py-3 px-4 me-2"><i class=""></i>Install App</a>
                               <!--  <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get Appoinment</a> -->
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="img/mobile.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const status = urlParams.get('status');
        if(status){
            alert('You have been registered successfully');
        }
        </script>
        <!-- Call to Action End -->
@endsection
