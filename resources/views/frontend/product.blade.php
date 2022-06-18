@section('title', $products->title)
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
                            <li><a href="{{url('category/'.$products->categorys->id)}}">{{$products->categorys->title}}</a></li>
                            <li><a href="{{url('/')}}">{{$products->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-60 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{asset('uploads/products/images/'.$products->image) }}" data-zoom-image="{{asset('uploads/products/images/'.$products->image) }}" alt="{{ $products->title}}">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset('uploads/products/images/'.$products->image) }}" data-zoom-image="{{asset('uploads/products/images/'.$products->image) }}">
                                        <img src="{{asset('uploads/products/images/'.$products->image) }}" alt="{{ $products->title}}"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset('uploads/products/images/'.$products->image) }}" data-zoom-image="{{asset('uploads/products/images/'.$products->image) }}">
                                        <img src="{{asset('uploads/products/images/'.$products->image) }}" alt="{{ $products->title}}"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset('uploads/products/images/'.$products->image) }}" data-zoom-image="{{asset('uploads/products/images/'.$products->image) }}">
                                        <img src="{{asset('uploads/products/images/'.$products->image) }}" alt="zo-th-1"/>
                                    </a>

                                </li>
                                <li >
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset('uploads/products/images/'.$products->image) }}" data-zoom-image="{{asset('uploads/products/images/'.$products->image) }}">
                                        <img src="{{asset('uploads/products/images/'.$products->image) }}" alt="zo-th-1"/>
                                    </a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @include('frontend.layout.errors')
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <form action="{{route('add-to-cart', $products->id)}}" method="POST" id="addProduct" >
                        {{ @csrf_field() }}
                            <h1>{{$products->title}}</h1>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> ({{ rand(20, 50)}} reviews) </a></li>
                                </ul>

                            </div>
                            <div class="price_box">
                                <span class="current_price">${{$products->discount_price}}</span>
                                <span class="old_price">${{$products->selling_price}}</span>

                            </div>
                            <div class="product_desc">
                                <ul>
                                    {{-- {{ dd($products->status)}} --}}
                                    @if ($products->status == '0')
                                    <li style="color:red">Out Stock</li>
                                    @else
                                    <li>In Stock</li>
                                    <li>Instant delivery available*</li>
                                    @endif

                                </ul>
                                <p>{{  $products->desc}} </p>
                            </div>
							{{-- <div class="product_timing">
                                <div data-countdown="2023/12/15"></div>
                            </div>
                            <div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>color</label>
                                <ul>
                                    <li class="color1"><a href="#"></a></li>
                                    <li class="color2"><a href="#"></a></li>
                                    <li class="color3"><a href="#"></a></li>
                                    <li class="color4"><a href="#"></a></li>
                                </ul>
                            </div> --}}
                            <input type="hidden" name="prod_id", id="prod_id" value="{{$products->id}}">
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()? Auth::user()->id : '' }}">
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="10" name="prod_qty" id="prod_qty" value="1" type="number">
                                @if ($products->status == '0')
                                @else
                                <button class="button" type="submit" id="Add-To-Cart">add to cart</button>

                                @endif

                            </div>
                            {{-- <div class=" product_d_action">
                               <ul>
                                   <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                   <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                               </ul>
                            </div> --}}
                            <div class="product_meta">
                                <span>Category: <a href="{{url('category/'.$products->categorys->id)}}">{{$products->categorys->title}}</a></span>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                                <li>
                                     <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p>{{$products->desc}}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                <div class="product_d_table">
                                   <form action="" method="POST">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>Polyester</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Styles</td>
                                                    <td>Girly</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Properties</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    <h2>1 review for Donec eu furniture</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p><strong>admin </strong>- September 12, 2018</p>
                                                <span>roadthemes</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published.  Required fields are marked </p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                       <h3>Your rating</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment" ></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author"  type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email"  type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                         </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->


    <!--footer area start-->
    @include('frontend.layout.includes.footer')
