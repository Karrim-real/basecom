@section('title', 'Product Categorys')
@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')


    <!--Tranding product-->

    <section class="pt-60 pb-30 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Categorys</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                {{-- @foreach ($category as $categorys) --}}
                @foreach ($category->products as $proddss)
                        {{-- {{dd($proddss->title)}} --}}

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="single-tranding">
                        <a href="{{ url('product/'.$proddss->id.'/'.$proddss->slug) }}">
                            <div class="tranding-pro-img">
                                <img src="{{asset('uploads/products/images/'.$proddss->image) }}" alt="{{$proddss->title}}">
                            </div>
                            <div class="tranding-pro-title">
                                <h3>{{ $proddss->title}}</h3>
                            </div>

                        </a>
                    </div>
                </div>
                @endforeach
                {{-- @endforeach --}}

            </div>
        </div>
    </section><!--Tranding product-->




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
