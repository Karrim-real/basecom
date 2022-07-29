
@section('title', 'Homepage')
@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')



    <!--slider area start-->
    @include('frontend.layout.includes.slider')
    <!--Tranding product-->

    @if (!count($products))
    <div class="alert alert-warning">
        <h1 class="h2">No Product Available</h1>
    </div>

    @endif
    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Trending Services</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                    @foreach ($products as $product)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding">
                        <a href="{{ url('product/'.$product->id.'/'.$product->slug) }}">
                            <div class="tranding-pro-img">
                                <img src="{{asset('uploads/products/images/'.$product->image) }}" alt="{{$product->title}}">
                            </div>
                            <div class="tranding-pro-title">
                                <h3>{{ $product->title}}</h3>
                                <h4>{{$product->categorys->title}}</h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">${{ $product->discount_price}}</span>
                                    <span class="old_price">${{ $product->selling_price}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section><!--Tranding product-->

    <!--Features area-->
    <section class="features-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Awesome Features</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/1.png" alt="">
                        <h3>Discord Chat</h3>
                        <p>We will give you awesome hype on nfts project, so your project can attract the investors or nfts buyers.</p>

                            <h5>Kindly chat this contact</h5>
                            <h4>+2349036134063</h4>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/2.png" alt="">
                        <h3>100% security guarantee</h3>
                        <p>We give you 100% security guarantee on your orders and 100% refund if you don't like the service.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/3.png" alt="">
                        <h3>Awesome Support</h3>
                        <p>We will give you awesome support on your orders, so be rest assured on our service.</p>
                            <h4>Kindly chat this contact</h4>
                            <h6>+2349036134063 </h6>

                    </div>
                </div>

            </div>
        </div>
    </section><!--Features area-->







    @if (!count($recentProds))
    <div class="alert alert-warning">
        <h1 class="h2">No Product Available</h1>
    </div>
    @endif

    <!--Other product-->
    <section class="pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Other collections</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($recentProds as $recentProd)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding mb-30">
                        <a href="{{ url('product/'.$recentProd->id.'/'.$recentProd->slug) }}">
                            <div class="tranding-pro-img">
                                <img src="{{asset('uploads/products/images/'.$recentProd->image) }}" alt="{{ $recentProd->title}}">
                            </div>
                            <div class="tranding-pro-title">
                                <h3>{{$recentProd->title}}</h3>
                                <h4>{{$recentProd->categorys->title}}</h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">${{$recentProd->discount_price}}</span>
                                    <span class="old_price">${{$recentProd->selling_price}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!--Other product-->

    <!--Testimonials-->
    <section class="pb-60 pt-60 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="testimonial_are">
                        <div class="testimonial_active owl-carousel">
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-3.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>Amazing Service! My discord server grew significantly with quality users and engagement, I am so pleased with the work. Can only be recommended! You are the best for organic discord growth</p>
                                        <h3><a href="#">Kathy Young</a><span> - CEO of SunPark</span></h3>
                                    </figcaption>

                                </figure>
                            </article>
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-1.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>They delivered an excellent and exceeded my expectation.  First choice for all new NFTS project who want to build a larger community.  They were able  to get more members and all are real not a single bot. I would love work with them more, best service.</p>
                                        <h3><a href="#">John Sullivan</a><span> - Customer</span></h3>
                                    </figcaption>

                                </figure>
                            </article>
                            <article class="single_testimonial">
                                <figure>
                                    <div class="testimonial_thumb">
                                        <a href="#"><img src="assets/img/about/team-2.jpg" alt=""></a>
                                    </div>
                                    <figcaption class="testimonial_content">
                                        <p>\Excellent promotion, Good to see the members interacting with each other. It was easy to work with. Thanks you so much, I will definitely be placing more orders</p>
                                        <h3><a href="#">Jenifer Brown</a><span> - Manager of AZ</span></h3>
                                    </figcaption>

                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/Testimonials-->

    <!--Blog-->
    {{-- <section class="pt-60">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Blog Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row blog_wrapper">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.html">How to start drone</a></h3>
                                <div class="blog_meta">
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#">Sep 20, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.html">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog blog_bidio mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog1.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.html">See the tutorial</a></h3>
                                <div class="blog_meta">
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date">On : <a href="#">Aug 25, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.html">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <article class="single_blog mb-60">
                        <figure>
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="assets/img/blog/blog-details.jpg" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <h3><a href="blog-details.html">How to start drone</a></h3>
                                <div class="blog_meta">
                                    <span class="author">Posted by : <a href="#">Rahul</a> / </span>
                                    <span class="post_date"><a href="#">Sep 20, 2019</a></span>
                                </div>
                                <div class="blog_desc">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less</p>
                                </div>
                                <footer class="readmore_button">
                                    <a href="blog-details.html">read more</a>
                                </footer>
                            </figcaption>
                        </figure>
                    </article>
                </div>
            </div>
        </div>
    </section><!--/Blog--> --}}

    <!--shipping area start-->
    <section class="shipping_area">
        <div class="container">
            <div class=" row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Instant Delivery</h2>
                            <p>Instant delivery to our customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Support 24/7</h2>
                            <p>Contact us 24 hours a day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>100% Money Back</h2>
                            <p>You have 30 days to Return</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="assets/img/about/shipping4.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h2>Payment Secure</h2>
                            <p>We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shipping area end-->

    @include('frontend.layout.includes.footer')
   @include('frontend.layout.includes.alert-message')

