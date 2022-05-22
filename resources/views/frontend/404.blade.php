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
                            <li>404 pagess</li>
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
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random <br/> text. It has roots in a piece of classical</p>
                        <a href="{{ url('/') }}">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->


    <!--footer area start-->
    @include('frontend.layout.includes.footer')

