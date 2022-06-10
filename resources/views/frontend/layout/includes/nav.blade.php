<header>
    <div class="main_header">
        <!--header top start-->
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="support_info">
                            <p>Email: <a href="mailto:">support@drophunt.com</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="top_right text-right">
                            <ul>
                                @if (Auth::user())
                                {{-- {{ dd(Auth::user()) }} --}}
                                <li><a href="{{ url('my-account/'.Auth::user()->id.'/'.Auth::user()->name) }}">Account</a></li>
                                <li><a href="{{ url('checkout') }}">Checkout</a></li>
                                <li><a href="{{ url('logout') }}">Logout</a></li>
                                @else
                                <li><a href="{{ url('login') }}">Login</a></li>
                               <li><a href="{{ url('register') }}">Register</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->
        <!--header middel start-->
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <div class="middel_right">
                            <div class="search_container">
                               <form action="#">
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="middel_right_info">
                                @if (Auth::user())
                                <div class="header_wishlist">
                                    <a href="{{ url('my-account/'.Auth::user()->id.'/'.Auth::user()->name) }}"><img src="{{asset('assets/img/user.png')}}" alt=""></a>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)"><img src="{{asset('assets/img/shopping-bag.png')}}" alt=""></a>
                                    <span class="cart_quantity">0</span>

                                    <!--mini cart-->
                                    {{-- @foreach ($minicarts as $cartProds)
                                    {{ dd($cartsProds)}}
                                    @endforeach --}}
                                     <div class="mini_cart">
                                        <div class="cart_item">
                                           <div class="cart_img">
                                               <a href="localjjo" id="" ><img id="prodimage" src="myimgades" alt=""></a>
                                           </div>
                                            <div class="cart_info">
                                                <a href="product" id="prodlink"><span id="prodname"></span></a>
                                                <p>Qty: <span id="prodqty"></span> X $<span id="prodprice">  </span></p>
                                            </div>
                                            <div class="cart_remove">
                                                <a href="product"><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>

                                        <div class="mini_cart_footer">
                                           <div class="cart_button">
                                                <a href="{{ url('cart') }}">View cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a href="{{ url('checkout') }}">Checkout</a>
                                            </div>

                                        </div>

                                    </div>
                                    <!--mini cart end-->
                                </div>
                                @else
                                <div class="header_wishlist">
                                    <a href="{{ url('login')}}"><img src="{{asset('assets/img/user.png')}}" alt=""></a>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->
        <!--header bottom satrt-->
        <div class="main_menu_area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a href="{{ url('/') }}">home</a></li>
                                    <li><a href="{{ url('products') }}">Products</a></li>

                                    <li><a class="active" href="#">pages <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="{{ url('about') }}">About Us</a></li>
                                            <li><a href="{{ route('contact-us') }}">contact</a></li>
                                            <li><a href="{{ url('privacy') }}">privacy policy</a></li>
                                            <li><a href="{{ url('faq') }}">Frequently Questions</a></li>
                                            <li><a href="{{ url('login') }}">login</a></li>
                                            <li><a href="{{ url('register') }}">register</a></li>
                                            <li><a href="{{ url('forget-password') }}">Forget Password</a></li>
                                            <li><a href="{{ url('404') }}">Error 404</a></li>
                                            <li><a href="{{ url('cart') }}">cart</a></li>
                                            <li><a href="{{ url('tracking') }}">tracking</a></li>
                                            <li><a href="{{ url('checkout') }}">checkout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('categorys')}}">Categorys<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            @if ($categorys)
                                            @foreach ($categorys as $category)
                                            <li><a href="{{ route('category.id', $category->id)}}">{{ $category->title}} </a></li>
                                            @endforeach
                                            @endif

                                            {{-- <li><a href="blog-details.html"></a></li> --}}
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="blog-details.html">blog details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('about') }}"> About Us</a></li>
                                    <li><a href="{{ url('contact') }}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </div>
</header>
<!--header area end-->
