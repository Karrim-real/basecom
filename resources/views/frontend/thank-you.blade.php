@section('title', 'Thanks You')
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
{{-- @if (!count($datas))
<h4> An error Occour</h4>

@endif --}}
{{-- {{ session('datas')}} --}}
    <div class="row">
        <img src="/assets/img/404.jpg" alt=""/>
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
@php
    $reference = '';
    $total_price = 0;
@endphp
            @foreach ($getOrder as $orders)

            <tr>
                <td> {{ $orders->Products->title}} <strong> × {{ $orders->prod_qty}} </strong></td>
                <td>${{ number_format($orders->prod_qty * $orders->Products->discount_price, 2)}}</td>
            </tr>
            @php
                $reference = $orders->reference_id;
                $total_price += $orders->prod_qty * $orders->Products->discount_price;
            @endphp
            @endforeach
            {{-- @php
                $total_price += $cartProd->products->discount_price * $cartProd->prod_qty;
            @endphp
            @endforeach --}}

            </tbody>
            <tfoot>
                <tr>
                    <th>Reference No</th>
                    <td> {{ $reference}} </td>
                </tr>
                <tr>
                    <th>Shipping Fee</th>
                    <td><strong>Free</strong></td>
                </tr>
                <tr class="order_total">
                    <th>Total Price</th>
                     <td><strong>${{number_format($total_price, 2)}}</strong></td>
                </tr>
                <tr>


                    <th></th>
                     <td><a class="btn btn-info" href="#">Successfull</a></td>
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
