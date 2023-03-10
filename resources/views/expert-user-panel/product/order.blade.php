@extends('expert-user-panel.layout.index')
@section('title')
Orders
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Withdraw</strong> </h2>
                <ul class="header-dropdown">
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Delivery Charges</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr> 
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td ></td>
                                <td >Total Orders Amount:</td>
                                <td >PKR {{Auth::user()->orders()->sum('price','delivery_cost') }}</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach (Auth::user()->orders as $key => $order)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$order->product->name}}</td>
                                    <td >PKR {{$order->price}}</td>
                                    <td >PKR {{$order->delivery_cost}}</td>
                                    <td >{{$order->address}}</td>
                                    <td >{{$order->status}}</td>
                                    <td >{{$order->created_at->format('M d,Y h:i A')}}</td>
                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection