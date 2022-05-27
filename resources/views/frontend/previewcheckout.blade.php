@section('title', 'Preview Order')
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
                            <li><a href="{{route('home')}}">home</a></li>
                            <li>Previews Order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!--Checkout page section-->
    @if (!count($cartProds))
    <div class="alert">
        <h4 class="alert alert-warning">
            No Product in checkout
        </h4>
    </div>
    @else
    @if (session('datas'))
 @php
     $sessionData = session('datas');
    // dd($sessionData)
 @endphp
    @endif
    <div class="Checkout_section mt-60">
{{-- {{dd($sessionData)}} --}}
        <div class="container">

            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form  method="GET" id="paymentForm">
                            {{@csrf_field()}}
                            <h3>Preview Order</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>Twitter link <span>*</span></label>
                                    <h6 style="color: blue">{{ $sessionData['twitter']}}</h6>
                                </div>

                                <div class="col-lg-6 mb-20">
                                    <label>Discord Link<span>*</span></label>
                                    <h6 style="color: blue">{{ $sessionData['discord']}}</h6>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Instagram Link <span>(optional)</span></label>
                                    <h6 style="color: blue">{{ $sessionData['instagram']}}</h6>
                                </div>

                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Description about your order</label>
                                        <p>{{ $sessionData['message']}}.</p>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
@php
    $total_price = 0;
    $total_qty = 0;
@endphp

                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cartProds as $cartProd)

                                    <tr>
                                        <td> {{$cartProd->products->title}} <strong> × {{$cartProd->prod_qty}}</strong></td>
                                        <td>${{number_format($cartProd->products->discount_price * $cartProd->prod_qty, 2)}}</td>
                                    </tr>

                                    @php
                                        $total_price += $cartProd->products->discount_price * $cartProd->prod_qty;
                                        $total_qty += $cartProd->prod_qty;
                                    @endphp
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>${{number_format($total_price, 2)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Quantity</th>
                                            <td><strong>{{$total_qty}}</strong></td>
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>${{number_format($total_price, 2)}}</strong></td>
                                        </tr>

                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment_method">
                                @if ($sessionData['payment_type'] == 'paystack')
                                <div class="panel-default">
                                    <input id="payment_defult" name="payoption" id="paytype" value="paystack" type="radio" checked data-target="createp_account" />
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour">Paystack <img src="assets/img/icon/papyel.png" alt=""></label>

                                    <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body1">
                                        <p>Pay via Paystack; you can pay with your credit card if you don’t have a PayPal. <a href="#">What is Paypal?</a></p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="panel-default">
                                    <input id="payment_defult" name="payoption" value="btc" id="paytype" type="radio" checked data-target="createp_account" required/>
                                    <label for="payment_defult" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour">Crypto Payment <img src="assets/img/icon/papyel.png" alt=""></label>

                                    <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                        <div class="card-body1">
                                        <p>Pay via Crytocurrency; you can pay with your Crypto Coin, such as Bitcoin, Etereuim and others.. Read More here. <a href="lazerpay.com">What is Lazerpay Crytocurrency payment ?</a></p>
                                        </div>
                                    </div>
                                </div>

                                @endif

                                <input type="hidden" name="email" id="email" value="{{Auth::user()->email}}">
                                <input type="hidden" name="name" id="name"  value="{{Auth::user()->name}}">
                                <input type="hidden" name="phone" id="phone" value="{{Auth::user()->phone}}">

                                <input type="hidden" name="amount" id="amounts" value="{{ $total_price }}">
                                <input type="hidden" name="total_qty" value=" {{$total_qty }}">
                                {{-- {{dd($total_price)}} --}}
                                <div class="order_button">
                                    <button  type="submit" id="buynow">Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--Checkout page section end-->
    @include('frontend.layout.includes.footer')
