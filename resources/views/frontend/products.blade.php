@section('title', 'Products')
@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')


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
                        <h2>Tranding Products</h2>
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
                                    <span class="current_price">${{ number_format($product->discount_price, 2)}}</span>
                                    <span class="old_price">${{ number_format($product->selling_price, 2)}}</span>
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

                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">

                </div>

            </div>
        </div>
    </section><!--Features area-->


    @if (!count($recentProds))
    <div class="alert alert-warning">
        <h1 class="h2">No Product Available in collections</h1>
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
                @foreach ($recentProds as $prod)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding mb-30">
                        <a href="{{ url('product/'. $prod->id.'/'.$prod->slug)}}">
                            <div class="tranding-pro-img">
                                <img src="assets/img/product/tranding-2.jpg" alt="">
                            </div>
                            <div class="tranding-pro-title">
                                <h3>{{$prod->title}}</h3>
                                <h4> {{ $prod->categorys->title}} </h4>
                            </div>
                            <div class="tranding-pro-price">
                                <div class="price_box">
                                    <span class="current_price">${{number_format($prod->discount_price, 2)}}</span>
                                    <span class="old_price">${{number_format($prod->selling_price, 2)}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section><!--Other product-->


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
