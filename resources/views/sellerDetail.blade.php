@extends('layouts.app', ['menu' => 'category'])

@section('css')
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        

        
    </style>
@endSection

@section('content')
    <div class="container-fluid" id="sellerDetail">
        <div class="row justify-content-center">
            <div class=" col-12 col-md-4 mt-3 mx-2 left-side">
                <div class="row mb-2">
                    <div class="card shadow p-3  rounded">
                        <div class="card-body row p-0">
                            <div class="col-12">
                            <a href="#" class="update_wishlist">
                            @if(DB::table('wishlist')->where('user_id','=',Auth::id())->where('seller_id','=',$sellerDetail->id)->exists())
                            <img src="{{ asset('img/like-heart-round-icon (1).svg') }}" width="25px" id="change-icon" class="wishlist-icon" alt="add to wishlist">
                            @else
                            <img src="{{ asset('img/like-heart-round-line-icon.svg') }}" width="25px" id="change-icon" class="wishlist-icon" alt="add to wishlist">
                            @endif
                            </a>
                                <h2 class="shop-name"> {{ $sellerDetail->store_name }}</h2>

                                <div class="row my-2">
                                    <h4 class="seller-name col-6">{{ $sellerDetail->first_name }}
                                        {{ $sellerDetail->last_name }}</h4>
                                </div>

                                <p class="card-text address-section my-3">Address : {{ $sellerDetail->address }},
                                    {{ $sellerDetail->city }}, {{ $sellerDetail->state }} </p>
                                <div class="row mt-2">
                                    <a href="{{ $sellerDetail->website }}" target="_blank"
                                        class="btn btn-primary col-5 m-2">Website</a>
                                    <a href="https://maps.google.com/?q={{ $sellerDetail->latitude }},{{ $sellerDetail->longitude }}"
                                        class="btn btn-primary col-5 m-2">Direction</a>
                                    <a href="#" class="btn btn-primary col-5 m-2">Share</a>
                                    <a href="#" class="btn btn-primary col-5 m-2">Call</a>
                                </div>
                                <a href="https://api.whatsapp.com/send?phone=+91{{ $sellerDetail->whatsapp_number}}&text=Hello" class="float" target="_blank">
                            <i class="fa fa-whatsapp my-float"></i>
                                </a>

                            </div>
                            <div class="col-12 text-center mt-2 youtube-video">
                                @if ($sellerDetail->youtube)
                                    <iframe class="youtube-frame" frameborder="0" scrolling="no" marginheight="0"
                                        marginwidth="0" type="text/html"
                                        src="https://www.youtube.com/embed/{{ $sellerDetail->youtube }}?autoplay=0&fs=1&iv_load_policy=3&showinfo=1&rel=0&cc_load_policy=1&start=0&end=0"></iframe>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card shadow p-3  rounded">
                        <div class="card-header bg-white border-0">
                            <h2>Location Summary</h2>
                        </div>
                        <div class="card-body">
                            <iframe width="100%" height="230px" style="border:0" loading="lazy" allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBi6t8itY_2rOzHhvXEAfe2nmlpW_UYC3w
                            &center=19.2183307,72.97808976&zoom=18&maptype=satellite">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7  mt-3 right-section">
                <div class="row">
                    <div class="card shadow pt-4 rounded ">
                        <div class="card-header bg-white border-0">
                            <h2>Gallery</h2>
                        </div>
                        <div class="card-body">
                            <div id="seller-image-slider" class="seller-image-slider owl-carousel owl-theme">
                                @if ($sellerDetail->image1)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->image1 }}" /></div>
                                @endif
                                @if ($sellerDetail->image2)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->image2 }}" /></div>
                                @endif
                                @if ($sellerDetail->image3)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->image3 }}" /></div>
                                @endif
                                @if ($sellerDetail->image4)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->image4 }}" /></div>
                                @endif
                                @if ($sellerDetail->image5)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->image5 }}" /></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="card shadow p-3 rounded">
                        <div class="card-header bg-white border-0">
                            <h2>Offers</h2>
                        </div>
                        <div class="card-body">
                            <div id="offer-image-slider" class="offer-image-slider owl-carousel owl-theme">
                                @if ($sellerDetail->offer1)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->offer1 }}" /></div>
                                @endif
                                @if ($sellerDetail->offer2)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->offer2 }}" /></div>
                                @endif
                                @if ($sellerDetail->offer3)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->offer3 }}" /></div>
                                @endif
                                @if ($sellerDetail->offer4)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->offer4 }}" /></div>
                                @endif
                                @if ($sellerDetail->offer5)
                                    <div class="item"><img class="img-fluid"
                                            src="{{ URL::to('/') }}/images/{{ $sellerDetail->offer5 }}" /></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3 p-5">
                <div class="row">
                    <div class="card shadow p-1 p-md-5 rounded row">
                        <div class="col-12 row">
                            <div class=" col-12 col-md-6">
                                <p> <i class="fa-solid fa-star fs-4"></i> 4.84(324 reviews)</p>
                            </div>
                            <div class=" col-12 col-md-6 text-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addReview">Add Review</button>
                            </div>
                        </div>
                        <div class="col-12 row mt-3">
                            <div class="col-12 col-md-6 row">
                                <div class=" col-12 col-3">
                                    <img class="icon-image"
                                        src="data:image/png;base64,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" />
                                </div>
                                <div class="col-12 col-md-9">
                                    <h5 class="mt-4">Hello</h5>
                                    <span class="date">March 2010</span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            </div>
                        </div>
                        <div class="col-12 row mt-5 justify-content-center">
                            <button type="button" class="btn btn-outline-primary col-12 col-2 mb-2">Show Review</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action={{ route('add-review') }} method="POST">
                        @csrf
                        <input class="d-none" name="user_id" value="1" />
                        <input class="d-none" name="seller_id" value="2" />
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="review_text" name="review_text"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea2">write review .....</label>
                        </div>
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary mt-3">Add Review</button>
                            <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endSection
@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        var user_id="{{Auth::id()}}";
        var current_path = "{{Request::path()}}";
        var event_type = 'load';
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/api/accessUserAgent',
                data:{
                    user_id:user_id,
                    current_path:current_path,
                    event_type:event_type
                    
                },
                success:function(response){
                    console.log(response);
                    }
                
            });
    
        $('.update_wishlist').click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var seller_id="{{$sellerDetail->id}}";
            $.ajax({
                type: 'POST',
                url: '/update-wishlist',
                data: {
                    seller_id: seller_id,
                    user_id: user_id
                },
                success:function(response){
                    if(response.action=='add'){
                        var Image_Id = document.getElementById('change-icon');
                        Image_Id.src="{{ asset('img/like-heart-round-icon (1).svg') }}";
                    } else{
                        var Image_Id = document.getElementById('change-icon');
                        Image_Id.src="{{ asset('img/like-heart-round-line-icon.svg') }}";
                    }
                    }
                
            });
        });
    });
    $('.owl-carousel').owlCarousel({
    loop:true,
    nav:false,
    dots:true,
    autoplay:true,
    items:1,
  
})
        
  
        $(window).on('scroll', function() {
            console.log($(this).scrollTop());
            if ($(this).scrollTop() > 200) {
                $('.header-style2').addClass('fixed-top');
                $('.left-side').addClass('left-section');
            } else {
                $('.header-style2').removeClass('fixed-top');
                $('.left-side').addClass('left-section');
            }
        });
    </script>
@endSection
