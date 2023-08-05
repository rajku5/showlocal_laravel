@extends('layouts.app')

@section('content')
<!-- breadcrumb start -->
<div class="breadcrumb-main mt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>Privacy Policy</h2>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="faq-section section-big-py-space b-g-light">
  <div class="container">
    <div class="row">
      <div class="col-12">
          {!! $data->value ?? '' !!}
      </div>
    </div>
  </div>
</section>
<!-- section end -->

@endSection