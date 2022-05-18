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
                            <li>Thank You</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<br>

    <div class="row">
        <img src="assets/img/404.jpg" alt=""/>
    <div class="col-md-6">
    <h4 class="text-center">Your order was Successfull</h4>
    <div class="order_table table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            {{-- @foreach ($cartProds as $cartProd) --}}

            {{-- <tr>
                <td> {{$cartProd->products->title}} <strong> × {{$cartProd->prod_qty}}</strong></td>
                <td>${{number_format($cartProd->products->discount_price * $cartProd->prod_qty, 2)}}</td>
            </tr> --}}

            <tr>
                <td> rice <strong> × 2</strong></td>
                <td>$1889</td>
            </tr>
            {{-- @php
                $total_price += $cartProd->products->discount_price * $cartProd->prod_qty;
            @endphp
            @endforeach --}}

            </tbody>
            <tfoot>
                <tr>
                    <th>Ammount</th>
                    <td>$19000</td>
                    {{-- <td>${{number_format($total_price, 2)}}</td> --}}
                </tr>
                <tr>
                    <th>Shipping Fee</th>
                    <td><strong>Free</strong></td>
                </tr>
                <tr class="order_total">
                    <th>Order Total</th>
                    {{-- <td><strong>${{number_format($total_price, 2)}}</strong></td> --}}
                    <td><strong>$1000</strong></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button class="btn btn-primary">Print Receipt</button></td>
                    {{-- <td>${{number_format($total_price, 2)}}</td> --}}
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
<br>
<br>
<br>
<br>
    @include('frontend.layout.includes.footer')
