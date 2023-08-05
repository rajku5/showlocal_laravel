<!-- Login Modal -->
<div class="modal fade " id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
           <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-xxl py-5">
                                    <div class="container">
                                        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                                            style="max-width: 600px;">
                                            <h1 class="mb-3">Log In</h1>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp" data-wow-delay="0.5s">
                                                    <form action="{{ route('user.login') }}" method="POST">
                                                        @csrf
                                                        <div class="row g-3">

                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        name="number" placeholder="Your Name"  value="{{ old('number') }}">
                                                                    <label for="number">Phone Number</label>
                                                                    @error('number')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        placeholder="Your password" value="">
                                                                    <label for="password">Password</label>
                                                                    @error('password')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <button class="btn btn-primary w-100 py-3"
                                                                    type="submit">Login</button>
                                                            </div>

                                                            <div class="col-8">
                                                                <a class="text-color" style="cursor:pointer;" data-bs-target="#signUp" data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">Don't Have an Account? Sign
                                                                    up</a>
                                                            </div>
                                                            <div class="col-4">
                                                                <a class="text-color" style="cursor:pointer;" data-bs-target="#passwordforgot"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">Forgot Password?</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                                <img class="img-fluid" src="img/login.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Signup Modal -->
<div class="modal fade " id="signUp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <!-- Contact Start -->
                                <div class="container-xxl py-5">
                                    <div class="container">
                                        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                                            style="max-width: 600px;">
                                            <h1 class="mb-3">Sign Up</h1>
                                        </div>
                                        <div class="row g-4">


                                            <div class="col-md-6">
                                                <div class="wow fadeInUp" data-wow-delay="0.5s">
                                                    <form action="{{ route('user.register') }}" method="POST">
                                                        @csrf
                                                        <div class="row g-3">
                                                            <h6>By Filling up this form you will be registered as a User
                                                            </h6>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control @error('first_name') is-invalid @enderror"
                                                                        name="first_name" id="first_name"
                                                                        placeholder="Your First Name"
                                                                        value="{{ old('first_name') }}">
                                                                    <label for="name">First Name</label>
                                                                    @error('first_name')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control @error('last_name') is-invalid @enderror"
                                                                        name="last_name"
                                                                        id="last_name"placeholder="Your Last Name"
                                                                        value="{{ old('last_name') }}">
                                                                    <label for="email">Last Name</label>
                                                                    @error('last_name')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="email"
                                                                        class="form-control  @error('email') is-invalid @enderror"
                                                                        name="email" id="email"
                                                                        placeholder="Your Email"
                                                                        value="{{ old('email') }}">
                                                                    <label for="email">Email id</label>
                                                                    @error('email')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        id="password" name="password"
                                                                        placeholder="Password"
                                                                        value="{{ old('password') }}">
                                                                    <label for="subject">Password</label>
                                                                    @error('password')
                                                                        <div class="alert alert-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="password"
                                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                        id="password_confirmation"
                                                                        name="password_confirmation"
                                                                        placeholder="Confirm Password" value="">
                                                                    <label for="subject">Confirm Password</label>
                                                                    @error('password_confirmation')
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="phone_number" name="phone_number"
                                                                        placeholder="Contact Number">
                                                                    <label for="subject">Contact Number</label>
                                                                    @error('phone_number')
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                
                                                                <a class="btn btn-primary w-100 py-3" id="send-button"
                                                                    onclick="get_generate_mobile_otp()">Send OTP</a>
                                                                <a class="btn btn-primary w-100 py-3 d-none"id="resend-button"
                                                                    onclick="get_generate_mobile_otp()">Resend OTP</a>
                                                            </div>
                                                            <div class="col-6 d-none" id="otp-section">
                                                                <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="input_otp" name="input_otp"
                                                                        placeholder="Enter otp">
                                                                    <label for="subject">OTP</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 d-none" id="confirm-section">
                                                                <a class="btn btn-primary w-100 py-3 "
                                                                    onclick="get_verify_mobile_otp()">Confirm OTP</a>
                                                            </div>

                                                            <div class="col-12">
                                                                <button class="btn btn-primary w-100 py-3 "
                                                                    type="submit" disable>Submit</button>
                                                            </div>
                                                            <div class="col-6">
                                                                <a class="text-color" style="cursor:pointer;" data-bs-target="#login" data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">Already Registered? Log
                                                                    In</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                                <img class="img-fluid" src="img/signup.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- password reset Modal -->
<div class="modal fade " id="passwordreset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <!-- Contact Start -->
                                <div class="container-xxl py-5">
                                    <div class="container">
                                        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                                            style="max-width: 600px;">
                                            <h1 class="mb-3">Reset New Password</h1>
                                        </div>
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="wow fadeInUp" data-wow-delay="0.5s">
                                                    <form>
                                                        <div class="row g-3">
                                                            <h6>Reset your New Password</h6>

                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="email" class="form-control"
                                                                        id="email" placeholder="Your Email">
                                                                    <label for="email">New Password</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-floating">
                                                                    <input type="email" class="form-control"
                                                                        id="email" placeholder="Your Email">
                                                                    <label for="email">Confirm Password</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <button class="btn btn-primary w-100 py-3"
                                                                    type="submit">Submit</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                                <img class="img-fluid" src="img/reset.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Contact End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- password reset Modal -->
<div class="modal fade " id="passwordforgot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-body">
               <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Forgot Password</h1>
                </div>
                <div class="row g-4">
                    
                    
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <form>
                                <div class="row g-3">
                                    <h6>Submit your Email id and you will receive an email to reset your password</h6>
                                    
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Email id</label>
                                        </div>
                                    </div>                                
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                    </div>
                                    <div class="col-6">
                                         <a class="text-color" style="cursor:pointer;" data-bs-target="#login" data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">Back to Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="img/password.png" alt="">
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>



<!-- Pincode Modal -->
<div class="modal fade " id="pincode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Pincode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class=" row col-12">
                                        <form action="{{ route('user.pincode') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-12">
                                                    <label for="validationCustom05" class="col-form-label pt-0">Enter
                                                        the pincode :- </label>
                                                    <input class="form-control" id="pincode" name="pincode"
                                                        type="text" required>
                                                </div>
                                                <div class="form-group col-12 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary col-12  website-color">Submit</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
