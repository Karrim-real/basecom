@section('title', 'Contact Us')
@include('frontend.layout.includes.head')
@include('frontend.layout.includes.minicart')
@include('frontend.layout.includes.nav')
  <!--breadcrumbs area start-->
  <div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index-2.html">home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<section class="account">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="account-contents" style="background: url('assets/img/about/about2.jpg'); background-size: cover;">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="account-thumb">
                                <h2>Contact us</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis consectetur similique deleniti pariatur enim cumque eum</p>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                            <div class="account-content">
                                <form action="{{ route('contact-send') }}" method="POST" id="loginPost">
                                    {{ @csrf_field() }}
                                        @include('frontend.layout.errors')
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <label for="name">Name</label>
                                                <input type="text" placeholder="Name" name="name" id="name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-acc-field">
                                                <label for="email">Email</label>
                                                <input type="email" placeholder="Email" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-acc-field">
                                                <label for="msg">Message</label>
                                                <textarea name="message" id="msg"  rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="single-acc-field boxes">
                                        <input type="checkbox" id="checkbox">
                                        <label for="checkbox">Important message</label>
                                    </div>
                                    <div class="single-acc-field">
                                        <button type="submit">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--footer area start-->
    @include('frontend.layout.includes.footer')
