@extends('expert-user-panel.layout.index')
@section('title')
Create Order on Product {{$product->name}}
@endsection

@section('content')
@if(Auth::user()->orderStatus($product->price))
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="body">
                    <form enctype="multipart/form-data" action="{{route('user.order.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="status" value="In Process">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">           
                                    <label for="">Name</label>                                                 
                                    <input type="text" name="name" readonly value="{{Auth::user()->name}}" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">           
                                    <label for="">Price</label>                                                 
                                    <input type="text" name="price" readonly value="{{@$product->price}}" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">           
                                    <label for="">Delivery Address</label>                                                 
                                    <input type="text" name="address" value="" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">           
                                    <label for="">Delivery Charges</label>                                                 
                                    <input type="text" name="delivery_cost" readonly value="150" class="form-control" placeholder="" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group text-right">     
                                    <button class="btn btn-primary" type="submit">Create Order</button>      
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="body"> 
                    <p>
                        You Don't Have amount to purchase that product.May your Remaining Amount is {{Auth::user()->remainingProductPrice()}} is less than order amount is PKR {{$product->price}} 
                        and delivery cost is PKR 150 So may your balance in e-wallet {{Auth::user()->balance}} is less than delivery cost.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection