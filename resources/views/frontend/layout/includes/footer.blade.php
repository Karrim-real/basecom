
    <!--footer area start-->
    <footer class="footer_widgets">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_logo">
                            <a href="#"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                        </div>
                        <div class="footer_contact">
                            <p>John draw real poor on call my from. May she mrs furnished discourse extremely. Ask doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others except</p>
                            <p>Ask doubt noisy shade guest Lose away off why half led have near bed. At engage simple father of period others except</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href=" {{url('about')}} ">About Us</a></li>
                                <li><a href="{{url('delivery')}}">Delivery Information</a></li>
                                <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
                                <li><a href="{{url('terms')}}">Terms & Conditions</a></li>
                                <li><a href="{{url('return')}}">Returns</a></li>
                                <li><a href="{{url('giftcert')}}">Gift Certificates</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{url('login')}}">My Account</a></li>
                                <li><a href="{{url('about')}}">Order History</a></li>
                                <li><a href="{{url('#')}}">Wish List</a></li>
                                <li><a href="{{url('blog')}}">Newsletter</a></li>
                                <li><a href="{{url('about')}}">Affiliate</a></li>
                                <li><a href="{{url('faq')}}">International Orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widgets_container newsletter">
                        <h3>Follow Us</h3>
                        <div class="footer_social_link">
                            <ul>
                                <li><a class="facebook" href="http://www.facebook.com" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="http://www.twitter.com"  target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="http://www.instagram.com" target="_blank"  title="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="linkedin" href="http://www.linkedin.com"  target="_blank" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="rss" href="http://www.google.com"  target="_blank" title="rss"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                        <div class="subscribe_form">
                            <h3>Join Our Newsletter Now</h3>
                            <form id="mc-form" class="mc-form footer-newsletter" method="POST">
                                <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." />
                                <button id="mc-submit">Subscribe!</button>
                            </form>
                            <!-- mailchimp-alerts Start -->
                            <div class="mailchimp-alerts text-centre">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                            </div><!-- mailchimp-alerts end -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p> <a href="karrim4real@gmail.com">Fityo Strore</a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="{{asset('assets/img/icon/payment.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
<!-- JS
============================================ -->

<!--jQuery -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>


<!--Paystack Inline -->
<script src="https://js.paystack.co/v1/inline.js"></script>
<!-- Addons JS -->

<script src="https://cdn.jsdelivr.net/gh/LazerPay-Finance/checkout-build@main/checkout@1.0.1/dist/index.min.js"></script>


<script src="{{ asset('assets/js/addons.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>







</body>

<!-- index.html  03:25:08 GMT -->
</html>
