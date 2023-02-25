@extends('front.layout.index')
@section('meta')
    
<title>CONTACT US | GET 5X</title>
<meta name="description" content="Multipurpose HTML template.">
@endsection

@section('content')
  <!--=======Banner-Section Starts Here=======-->
  <section class="bg_img hero-section-2 left-bottom-lg-max" data-background="front/assets/images/about/hero-bg5.png">
    <div class="container">
        <div class="hero-content text-white">
            <h1 class="title">Contact</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    Contact
                </li>
            </ul>
        </div>
    </div>
</section>
<!--=======Banner-Section Ends Here=======-->

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form enctype="multipart/form-data" action="{{route('admin.message.store')}}" class="checkout" method="post" name="checkout">
                            @csrf
                            <div id="customer_details" class="col2-set">
                                <div class="col-1">
                                    <div class="woocommerce-billing-fields">

                                        <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                            <label class="" for="billing_first_name">User Name <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="" id="billing_first_name" name="name" class="input-text ">
                                        </p>

                                        <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                            <label class="" for="billing_last_name">Email <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="email" value="" placeholder="" id="billing_last_name" name="email" class="input-text ">
                                        </p>
                                        <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                            <label class="" for="billing_last_name">Subject <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="" id="billing_last_name" name="subject" class="input-text ">
                                        </p>
                                        <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                            <label class="" for="billing_last_name">Message <abbr title="required" class="required">*</abbr>
                                            </label>
                                            <input type="text" value="" placeholder="" id="billing_last_name" name="message" class="input-text ">
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="order_review" style="position: relative;">


                                <div id="payment">

                                    <div class="form-row place-order">

                                        <input type="submit" data-value="Send" value="Send" id="place_order" name="woocommerce_checkout_place_order" class="button alt">


                                    </div>

                                    <div class="clear"></div>

                                </div>
                            </div>
                        </form>

                    </div>                       
                </div>                    
            </div>
            <div class="col-md-4">
                
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    @foreach(App\Models\Product::orderby('created_at','desc')->get()->take(10) as $product)
                    <div class="thubmnail-recent">
                        <img src="{{asset(@$product->images->first()->image)}}" class="recent-thumb" alt="">
                        <h2><a href="{{route('product.show',str_replace(' ', '_',$product->name))}}">{{@$product->name}}</a></h2>
                        <div class="product-sidebar-price">
                            <ins>PKR {{@$product->price}}</ins>                         
                        </div>                             
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection