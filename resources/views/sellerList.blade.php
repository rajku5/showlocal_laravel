@extends('layouts.app',['menu' => 'category'])

@section('content')

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

        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Seller List</h1>
                </div>
                <div class="row g-4">
                  @foreach ($sellerLists as $sellerList)
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    @if(DB::table('wishlist')->where('user_id','=',Auth::id())->where('seller_id','=',$sellerList->id)->exists())
                            <img src="{{ asset('img/like-heart-round-icon (1).svg') }}" width="25px" onclick="update_wishlist({{$sellerList->id}})" id="change-icon{{$sellerList->id}}" class="wishlist-icon" alt="add to wishlist">
                            @else
                            <img src="{{ asset('img/like-heart-round-line-icon.svg') }}" width="25px" onclick="update_wishlist({{$sellerList->id}})" id="change-icon{{$sellerList->id}}" class="wishlist-icon" alt="add to wishlist">
                            @endif
                        <a class="cat-item d-block bg-light text-center rounded p-3" href={{ route('view.seller.detail',['id'=>$sellerList->id]) }}>
                            <div class="rounded p-4">
                            @if(isset($sellerList->thumbnil_image))
                                 <img src="{{ URL::to('/') }}/images/{{$sellerList->thumbnil_image}}" class="img-fluid  " alt="product" style="height:200px"> 
                            @endif
                                <h6 class="mt-3">{{$sellerList->store_name}}</h6>
                                <h4>{{$sellerList->first_name.' '.$sellerList->last_name}}</h4>
                                <p>{{$sellerList->address}}</p>
                                <p> <i class="bi bi-star-fill"></i> {{(int)$sellerList->reviewAvg ?: 0}} ({{$sellerList->reviewTotal > 0 ?: 0}} reviews)</p>
                            </div>
                        </a>
                    </div>
                  @endforeach
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
                    
                }
            });
 }
</script>