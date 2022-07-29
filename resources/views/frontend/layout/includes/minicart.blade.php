<body>
    <!--header area start-->
    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                              <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="support_info">
                            <p>Any Enquiry: <a href="tel:">+1234567890</a></p>
                        </div>
                        <div class="top_right text-right">
                            <ul>
                               <li><a href="{{ url('my-account') }}"> My Account </a></li>
                               <li><a href="{{ url('checkout') }}"> Checkout </a></li>
                            </ul>
                        </div>

                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('products') }}">Services</a>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="{{ url('category/4') }}">Discord Service promotion</a>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="{{ url('categorys') }}">Discord Freelancing Services</a>
                                </li>


                                @if (Auth::user())
                                {{-- {{ dd(Auth::user()) }} --}}
                                <li class="menu-item-has-children"><a href="{{ url('my-account/'.Auth::user()->id.'/'.Auth::user()->name) }}">Account</a></li>
                                <li class="menu-item-has-children"><a href="{{ url('cart') }}">Cart</a></li>
                                <li class="menu-item-has-children"><a href="{{ url('checkout') }}">Checkout</a></li>
                                <li class="menu-item-has-children"><a href="{{ url('logout') }}">Logout</a></li>
                                @else
                                <li class="menu-item-has-children">
                                    <a href="{{ url('register') }}">Sign up</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{ url('login') }}">Login</a>
                                </li>
                                @endif

                                <li class="menu-item-has-children">
                                    <a href="{{ url('about') }}"> About us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@drophunt.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Offcanvas menu area end-->
