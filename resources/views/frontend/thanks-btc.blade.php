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

            </tbody>
            <tfoot>
                <tr>
                    <th>Reference No</th>
                    <td> </td>
                </tr>
                <tr>
                    <th>Shipping Fee</th>
                    <td><strong>Free</strong></td>
                </tr>
                <tr class="order_total">
                    <th>Total Price</th>
                     <td><strong>$</strong></td>
                </tr>

                <tr>
                    <th></th>
                     <td><a class="btn btn-warning" href="#">Pending</a></td>
                    {{-- <td>${{number_format($total_price, 2)}}</td> --}}
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="message">
        <p class="text-bold"> Dear users, We have receive your payment.
            Please note that your payment is currently pending, you will be notify via when your payment is complete receive.
            Thanks for choosing us.
        </p>
    </div>
</div>


</div>
<br>
<br>
<br>
<br>
    @include('frontend.layout.includes.footer')
