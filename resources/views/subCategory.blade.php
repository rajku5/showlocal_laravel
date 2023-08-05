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

    <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">{{$subCategoryLists->name}}</h1>
                </div>
                <div class="row g-4">
                  @foreach ($subCategoryLists->subsubCategoryList as $subsubCategoryList)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item d-block bg-light text-center rounded p-3" href={{ route('view.seller.list',['id'=>$subsubCategoryList->id]) }}>
                            <div class="rounded">
                                <div class="mb-2">
                                    <img class="img-fluid" src="{{ asset($subsubCategoryList->image)}}" alt="Icon">
                                </div>
                                <h6>{{$subsubCategoryList->name}}</h6>
                            </div>
                        </a>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
     
        <!-- Category End -->
@endSection