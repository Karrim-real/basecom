@section('title', 'Tracking')
@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')
    <!--header area end-->

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index-2.html">home</a></li>
                            <li>Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--Tracking product start-->
    <div class="tracking-product mt-60 mb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <h2>Your Tracking Number</h2>
                    <form action="#">
                        <input type="text" placeholder="Eg:#0.325FHJU658745EGU" required>
                        <button type="submit"><i class="fa fa-binoculars"></i> Track now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Tracking product end-->

    <!--Tracking product start-->
    <div class="feature-area  mt-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after">
                        <i class="fa fa-bullhorn"></i>
                        <h4>Seller Shipped Your order</h4>
                        <p>Certainty listening no no behaviour existence assurance situation is. Because add why</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-before">
                        <div class="animation">
                            <i class="fa fa-paper-plane"></i>
                        </div>
                        <h4>Depert from original Country</h4>
                        <p>Certainty listening no no behaviour existence assurance situation is. Because add why</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 bottom-after disabled">
                        <i class="fa fa-plane"></i>
                        <h4>Arrived at destination country</h4>
                        <p>Certainty listening no no behaviour existence assurance situation is. Because add why</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="single-feature-2 disabled">
                        <i class="fa fa-gift"></i>
                        <h4>Product Delivered</h4>
                        <p>Certainty listening no no behaviour existence assurance situation is. Because add why</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Tracking product end-->


    <!--footer area start-->
@include('frontend.layout.includes.footer')
