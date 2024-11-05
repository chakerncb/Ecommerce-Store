<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Chaker_Shop</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" /> --}}

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/LineIcons.3.0.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
                <!-- Start Header Middle -->
                <div class="header-middle">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-7">
                                <!-- Start Header Logo -->
                                <a class="navbar-brand" href="index.html">
                                    <img src="assets/images/logo/logo.svg" alt="Logo">
                                </a>
                                <!-- End Header Logo -->
                            </div>
                            <div class="col-lg-5 col-md-7 d-xs-none">
                                <!-- Start Main Menu Search -->
                                <div class="main-menu-search"> 
                                    <!-- navbar search start -->
                                    <div class="navbar-search search-style-5">
                                         <div class="search-select">
                                          {{--  <div class="select-position">
                                                <select id="select1">
                                                    <option selected>All</option>
                                                    <option value="1">option 01</option>
                                                    <option value="2">option 02</option>
                                                    <option value="3">option 03</option>
                                                    <option value="4">option 04</option>
                                                    <option value="5">option 05</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                        <div class="search-input">
                                            <input type="text" placeholder="Search">
                                        </div>
                                        <div class="search-btn">
                                            <button><i class="lni lni-search-alt"></i></button>
                                        </div>
                                    </div>
                                    <!-- navbar search Ends -->
                                </div>
                                <!-- End Main Menu Search -->
                            </div>
                            <div class="col-lg-4 col-md-2 col-5">
                                <div class="middle-right-area">
                                    <div class="nav-hotline">
                                        <i class="lni lni-phone"></i>
                                        <h3>Hotline:
                                            <span>(+213) 07 777 722 18</span>
                                        </h3>
                                    </div>
                                    <div class="navbar-cart">

                                     {{--   <div class="wishlist">
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-heart"></i>
                                                <span class="total-items">0</span>
                                            </a> 
                                        </div>--}}

                                        <div class="dropdown show">
                                            <a class="m-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="lni lni-world"></i>
                                            </a>
                                          
                                            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                         @endforeach
                                            </div>
                                          </div>
                                        

                                        <div class="m-2 cart-items">
                                            <a href="javascript:void(0)" class="main-btn">
                                                <i class="lni lni-cart"></i>
                                                <span class="total-items">2</span>
                                            </a>
                                            <!-- Shopping Item -->
                                            <div class="shopping-item">
                                                <div class="dropdown-cart-header">
                                                    <span>2 Items</span>
                                                    <a href="cart.html">View Cart</a>
                                                </div>
                                                <ul class="shopping-list">
                                                    <li>
                                                        <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                                class="lni lni-close"></i></a>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img" href="product-details.html"><img
                                                                    src="assets/images/header/cart-items/item1.jpg" alt="#"></a>
                                                        </div>
        
                                                        <div class="content">
                                                            <h4><a href="product-details.html">
                                                                    Apple Watch Series 6</a></h4>
                                                            <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                                class="lni lni-close"></i></a>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img" href="product-details.html"><img
                                                                    src="assets/images/header/cart-items/item2.jpg" alt="#"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                                                            <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="bottom">
                                                    <div class="total">
                                                        <span>Total</span>
                                                        <span class="total-amount">$134.00</span>
                                                    </div>
                                                    <div class="button">
                                                        <a href="checkout.html" class="btn animate">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ End Shopping Item -->
                                        </div>
                                        
                                            <ul class="user-login flex-md-row">
                                            @guest
                                            @if (Route::has('login'))

                                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            @endif
                
                                            @if (Route::has('register'))
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                             @endif
                                        </ul>

                                        @else
                                        <div class="m-2 wishlist">

                                                <div class="dropdown show">
                                                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="lni lni-user"></i>
                                                    </a>
                                                  
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item"">{{ Auth::user()->name }}</a>
                                                        <hr>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('logout-form').submit();">
                                                         {{ __('Logout') }}
                                                     </a>
                 
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                         @csrf
                                                     </form>
                                                    </div>
                                                  </div>
                                        @endguest
                                        </div>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Header Middle -->
    
        @yield('content')

        <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="assets/images/logo/white-logo.svg" alt="#">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information, Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: +1 (900) 33 169 7720</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@shopgrids.com">support@shopgrids.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="assets/images/footer/credit-cards-footer.png" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">GrayGrids</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{URL::asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>