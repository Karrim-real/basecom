@section('title', '404 | Page Not Found')
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
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li>404 page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->


    <!--error section area start-->
    <div class="error_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <img src="assets/img/404.jpg" alt=""/>
                        <h2>Opps! PAGE NOT BE FOUND</h2>
                        <p>You have enter incorrect page <br/> Please check address and try again, you can click below to go back home</p>
                        <a href="{{ url('/') }}">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->


    <!--footer area start-->
    @include('frontend.layout.includes.footer')

