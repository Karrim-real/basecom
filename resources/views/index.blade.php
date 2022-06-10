
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
                        <h3>Impressive Delivery</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/2.png" alt="">
                        <h3>100% security guarantee</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-features">
                        <img src="assets/img/icon/3.png" alt="">
                        <h3>Awesome Support</h3>
                        <p>consectetur adipisicing elit. Ut praesentium earum, blanditiis, voluptatem repellendus rerum voluptatibus dignissimos</p>
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
                                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45</p>
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
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even</p>
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
                                        <p>College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites</p>
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
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order</p>
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

