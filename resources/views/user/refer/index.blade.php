@extends('user.layout.index')
@section('meta')
<title>REFERRALS | USER PANEL | GET 5X</title>
@endsection
@section('content')
<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>REFERRALS</h2>
				</div>
			</div>
		</div>
	</div>
</div>
@if(Auth::user()->id == $main_user->id)
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="customer_details" class="col2-set">
                    <div class="col-1">
                        <div class="woocommerce-billing-fields">
                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                <label class="" for="billing_first_name">Left Refferral Link <abbr title="required" class="required">*</abbr>
                                </label>
                                <input type="text"  value="{{url('user/register',$main_user->left)}}" placeholder="" id="billing_first_name" name="payment" class="input-text ">
                            </p>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="woocommerce-shipping-fields">
                            <div class="shipping_address" style="display: block;">
                                
                                <p id="shipping_first_name_field" class="form-row form-row-first validate-required">
                                    <label class="" for="shipping_first_name">Right Referral Link <abbr title="required" class="required">*</abbr>
                                    </label>
                                    <input type="text" value="{{url('user/register',$main_user->right)}}" placeholder="" id="shipping_first_name" name="name" class="input-text ">
                                </p>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endif
{{-- @php 
$total_left = $total_right = $total_earning = 0;
foreach ($referrals as $referral)
{

    $total_left += count($referral->getOrginalLeft());
    $total_right += count($referral->getOrginalRight());
    $total_earning += $referral->balance;
}
@endphp --}}
<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <a href="{{url('user/left_refferal',$main_user->id)}}">
                    <div class="single-promo promo3" style="color:white;">
                        <p>Left Refferral</p>
                        <p>{{count($main_user->getOrginalLeft())}}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="{{url('user/right_refferal',$main_user->id)}}">
                    <div class="single-promo promo4" style="color:white;">
                        <p>Right Refferral</p>
                        <p>{{count($main_user->getOrginalRight())}}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="{{route('user.tree.show',$main_user->id)}}"> 
                    <div class="single-promo promo2" style="color:white;">
                        <p>Tree</p>
                        <p>{{count($main_user->getOrginalLeft()) + count($main_user->getOrginalRight())}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
{{-- <div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="single-promo promo1" style="color:white;">
                    <p>Users Total Left</p>
                    <p>{{$total_left}}</p>
                </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="single-promo promo2" style="color:white;">
                    <p>Users Total Right</p>
                    <p>{{$total_right}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="single-promo promo3" style="color:white;">
                    <p>User Total Earning</p>
                    <p>{{$total_earning}}</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area --> --}}
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-md-12 text-right">
                <form method="GET" class="form-inline">
                    <select name="status" class="form-control">
                        <option >Select</option>
                        <option @if(request()->status == 1) selected @endif value="1" >Active</option>
                        <option @if(request()->status == 2) selected @endif value="2" >Pending</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="shop_table">
                        <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Package Name</th>
                                <th>Package Amount</th>
                                <th>Refer By</th>
                                <th>Placement</th>
                                <th>Left Referral</th>
                                <th>Right Referral</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Earning</th>
                            </tr>
                        </thead>
                        <tfoot>
                            @foreach ($referrals as $key => $user)
                                <tr class="cart-subtotal">
                                    <td>{{$key + 1}}</td>
                                    <td><a href="{{url('user/refferral_detail',$user->id)}}"> {{$user->name}}</a></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>
                                        @if($user->package)
                                        {{$user->package->name}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->package)
                                        {{$user->package->price}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->refer_by)
                                        {{$user->refer_by_name($user->refer_by)}}
                                        @endif
                                    </td>
                                    <td>{{$user->placement()}}</td>
                                    <td>{{count($user->getOrginalLeft())}}</td>
                                    <td>{{count($user->getOrginalRight())}}</td>
                                    <td>{{$user->refer_type}}</td>
                                    <td>
                                        @if($user->checkstatus() =='old')
                                        <span class="badge badge-success">Active</span>    
                                        @else
                                        <span class="badge badge-danger">Pending</span>                                                      
                                        @endif</td>
                                    <td>{{$user->balance}}</td>
                    
                                </tr>
                            @endforeach
                            {{-- <tr class="cart-subtotal">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                </td>
                                <td></td>
                                <td>{{@$total_left}}</td>
                                <td>{{@$total_right}}</td>
                                <td></td>
                                <td></td>
                                <td>{{@$total_earning}}</td>
                
                            </tr> --}}
                        </tfoot>
                    </table>
                    {!! $referrals->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection