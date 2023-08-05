@extends('layouts.app',['menu'=>'contact-us'])

@section('content')

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Account Information</h1>
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
                    <button class="btn btn-primary w-100 py-3 activesidebutton" type="submit">Account Information</button>
                    </a>
                    <a href="/user-change-password">
                    <button class="btn btn-primary w-100 py-3 sidebutton" type="submit">Change Password</button>
                    </a>
                    <a href="/user-wishlist">
                    <button class="btn btn-primary w-100 py-3 sidebutton" type="submit">Wishlist</button>
                    </a>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <form method="POST" action="user-update-information">
                                @csrf
                            <input type="hidden" class="form-control" name="id" value="{{Auth::user()->id}}">
                                <div class="row g-3">
                                    
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="firstname" value="{{Auth::user()->first_name}}">
                                            <label for="name">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="lastname" value="{{Auth::user()->last_name}}">
                                            <label for="name">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" value="{{Auth::user()->email}}">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject" name="phonenumber" value="{{Auth::user()->phone_number}}">
                                            <label for="subject">Phone Number</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-6">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Update</button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@endSection
