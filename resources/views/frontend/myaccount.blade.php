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
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<br>
@if (!count($userOrders))
<h4> No Order Available</h4>

@endif
{{-- {{ session('datas')}} --}}
    <div class="row">
        <img src="/assets/img/404.jpg" alt=""/>
    <div class="col-md-6">
    <h4 class="text-center">My All Orders</h4>
    <div class="order_table table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Total Price of Product</th>
                    <th>Date</th>
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
    $total_prod_qty = 0;
    $total_price = 0;
@endphp
            @foreach ($userOrders as $orders)

            <tr>
                <td>  {{ $orders->id}}</td>
                <td> {{ $orders->Products->title}} <strong> × {{ $orders->prod_qty}} </strong></td>
                <td>${{ $orders->prod_qty * $orders->Products->discount_price}}</td>
                <td>{{ $orders->created_at->diffForHumans()}}</td>
            </tr>
            @php
                $reference = $orders->reference_id;
                $total_price += $orders->prod_qty * $orders->Products->discount_price;
                $total_prod_qty += $orders->prod_qty;
            @endphp
            @endforeach


            </tbody>
            <tfoot>

                <tr>
                    <th>Total Product Bought so Far</th>
                   <td></td>
                   <td><strong>{{ $total_prod_qty}} orders</strong></td>
                </tr>
                <tr class="order_total">
                    <td>Total Amount Spend So Far</td>
                    <th></th>
                    <td><strong>${{number_format($total_price, 2)}}</strong></td>
                    {{-- <td><strong> ${{$total_price}} </strong></td> --}}
                </tr>
                <tr>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
<center>{{ $userOrders->render()}}</center>

<br>
<br>
<br>
<br>
    @include('frontend.layout.includes.footer')
