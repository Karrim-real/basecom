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
                            <li><a href="{{url('/')}}">home</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    @if (!count($cartProds))
    <div class="col-md-6 text-center">
        <div class="">
            <h3 class="alert alert-primary">
                Cart is Empty
            </h3>
        </div>
    </div>
    @else

    <!--shopping cart area start -->
    <div class="shopping_cart_area mt-60">
        <div class="container">
            <form action="" method="POST" id="checkoutBtn">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                <table>
                            <thead>
                                <tr>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                    <th class="product_remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_qty = 0;
                                    $total_price = 0;
                                @endphp
                                @foreach ($cartProds as $cart)

                                <tr>
                                    <td class="product_thumb"><a href="{{url('product/'.$cart->products->id.'/'.$cart->products->title)}}"><img src="uploads/products/images/{{$cart->products->image}}" alt="{{$cart->products->title}}"></a></td>
                                    <td class="product_name"><a href="{{url('product/'.$cart->products->id.'/'.$cart->products->title)}}">{{$cart->products->title}}</a></td>
                                    <td class="product-price">${{ $cart->products->discount_price }}</td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1" max="10" value="{{$cart->prod_qty}}" type="number" disabled></td>
                                    <td class="product_total">${{$cart->products->discount_price * $cart->prod_qty }}</td>
									<td class="product_remove"><a href="{{ route('removeproduct',$cart->id)}}"><i class="ion-android-close"></i></a></td>
                                </tr>

                                @php
                                    $total_qty += $cart->prod_qty;
                                    $total_price += $cart->products->discount_price * $cart->prod_qty;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                            </div>
                            <div class="cart_submit">
                                {{-- <button type="button">update cart</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area start-->
                <div class="coupon_area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code left">
                                <h3>Coupon</h3>
                                <div class="coupon_inner">
                                    <p>Enter your coupon code if you have one.</p>
                                    <input placeholder="Coupon code" type="text" disabled>
                                    <button type="submit" disabled>Apply coupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="coupon_code right">
                                <h3>Cart Totals</h3>
                                <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">${{$total_price}}</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Total Quantity</p>
                                    <p class="cart_amount"><span>Weight:</span> {{ $total_qty}} pieces </p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">${{$total_price}}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--coupon code area end-->
            </form>
        </div>
    </div>
    @endif
    <!--shopping cart area end -->

    @include('frontend.layout.includes.footer')
