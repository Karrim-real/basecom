@section('title', 'Checkout')
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
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    @include('frontend.layout.errors')

    <!--Checkout page section-->
    @if (!count($cartProds))
    <div class="alert">
        <h4 class="alert alert-warning">
            No Product in checkout
        </h4>
    </div>
    @else

    <div class="Checkout_section mt-60">

        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="user-actions">
                        <h3>
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Get any promo code?
                            <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true" aria-controls="checkout_coupon">Click here to enter your code</a>

                        </h3>
                        <div id="checkout_coupon" class="collapse" data-parent="#accordionExample">
                            <div class="checkout_info">
                                <form action="" method="POST">
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form action="{{route('place-order')}}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field()}}
                            <h3>Social Media Handle</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>Twitter link <span>*</span></label>
                                    <input type="text" name="twitter" placeholder="Please enter your twitter handle link" required>
                                </div>

                                <div class="col-lg-6 mb-20">
                                    <label>Discord Link<span>*</span></label>
                                    <input type="text" name="discord" placeholder="Please enter your discord handle link" required>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Instagram Link <span>(optional)</span></label>
                                    <input type="text" name="instagram" placeholder="Please enter your instagram handle link">
                                </div>

                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Description about your order</label>
                                        <textarea id="order_note" name="message" rows="2" placeholder="Min:100 words, Max: 800 words"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-20">
                                <label> Related Arts </label>
                                {{-- <input type="file" name="image" accept="image/*"  > --}}
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

                                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                <input type="hidden" name="phone" value="{{Auth::user()->phone}}">

                                <input type="hidden" name="amount" value="{{$total_price * 100}}">
                                <input type="hidden" name="total_qty" value=" {{$total_qty }}">


                                <div class="order_button">
                                    <button  type="submit">Proceed to buy</button>
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
