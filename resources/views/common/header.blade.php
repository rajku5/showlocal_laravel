       <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="p-2 me-2">
                        <img class="img-fluid" src="{{ asset('img/logo.svg')}}" alt="Icon" style="width: 250px;">
                    </div>
                  
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{route('home')}}" class="nav-item nav-link {{ $menu == 'home' ? 'active' :''}}">Home</a>
                        <a href="{{route('Category')}}" class="nav-item nav-link {{ $menu == 'category' ? 'active' :''}}">Categories</a>
                        <a href="{{route('AboutUs')}}" class="nav-item nav-link  {{ $menu == 'about-us' ? 'active' :''}}">About Us</a>
                        <a href="{{route('SellerRegistration')}}" class="nav-item nav-link {{ $menu == 'seller-registration' ? 'active' :''}}">List Your Shop</a>
                        <a href="{{route('AffiliateProgram')}}" class="nav-item nav-link {{ $menu == 'affiliate-program' ? 'active' :''}}">Affiliate Program</a>
                        <a href="{{route('ContactUs')}}" class="nav-item nav-link {{ $menu == 'contact-us' ? 'active' :''}}">Contact Us</a>
                        @if(session()->has('user'))
                            <a href="{{route('view.user.accountinfo')}}" class="nav-item nav-link {{ $menu == 'account' ? 'active' :''}}">Account</a>
                        @endif
                     </div>
                        @if(session()->has('user'))
                           <a  href="{{route('user.logout')}}" class="btn btn-primary  d-none d-lg-flex">Logout</a>
                        @else 
                           <a class="btn btn-primary d-none d-lg-flex"  data-bs-toggle="modal" data-bs-target="#signUp">Sign Up</a>
                        @endif
                    
                   
                </div>
            </nav>
        </div>
        <!-- Navbar End -->