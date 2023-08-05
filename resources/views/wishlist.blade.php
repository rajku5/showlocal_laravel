@extends('layouts.app',['menu'=>'contact-us'])

@section('content')

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Wishlist</h1>
                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="/user-account-information">
                    <button class="btn btn-primary w-100 py-3 sidebutton" type="submit">Account Information</button>
                    </a>
                    <a href="/user-change-password">
                    <button class="btn btn-primary w-100 py-3 sidebutton" type="submit">Change Password</button>
                    </a>
                    <a href="/user-wishlist">
                    <button class="btn btn-primary w-100 py-3 activesidebutton" type="submit">Wishlist</button>
                    </a>
                    <a href="logout">
                    <button class="btn btn-primary w-100 py-3 sidebutton" type="submit">Logout</button>
                    </a>
                    </div>
                    
                    <div class="col-md-8">
                    <div class="row g-4">
                        @foreach ($seller as $key => $data)
                            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            @if(DB::table('wishlist')->where('seller_id',$data->id)->exists())
                            <img src="{{ asset('img/like-heart-round-icon (1).svg') }}" width="25px" onclick="update_wishlist({{$data->id}})" id="change-icon{{$data->id}}" class="wishlist-icon" alt="add to wishlist">
                            @else
                            <img src="{{ asset('img/like-heart-round-line-icon.svg') }}" width="25px" onclick="update_wishlist({{$data->id}})" id="change-icon{{$data->id}}" class="wishlist-icon" alt="add to wishlist">
                            @endif
                            <a class="cat-item d-block bg-light text-center rounded p-3" href={{ route('view.seller.detail',['id'=>$data->id]) }}>
                                <div class="rounded p-4">
                                    @if(isset($data->thumbnil_image))
                                        <img src="{{ URL::to('/') }}/images/{{$data->thumbnil_image}}" class="img-fluid  " alt="product" style="height:200px">
                                        
                                    @endif
                                    <h6 class="mt-3">{{$data->store_name}}</h6>
                                    <h4>{{$data->first_name.' '.$data->last_name}}</h4>
                                    <p>{{$data->address}}</p>
                                
                                </div>
                            </a>
                            </div>
                        @endforeach
                    </div>
                    </div>
            </div>
        </div>
        </div>
@endSection
<script type="text/javascript">
function update_wishlist($seller_id) {
    var img=event.target.src;    
    if (img.indexOf("{{ asset('img/like-heart-round-icon%20(1).svg') }}")!=-1) {
            event.target.src  = "{{ asset('img/like-heart-round-line-icon.svg') }}";
        } else{
            event.target.src  = "{{ asset('img/like-heart-round-icon (1).svg') }}"
        }
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var seller_id=$seller_id;
            var user_id="{{Auth::id()}}";
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
 }
</script>
