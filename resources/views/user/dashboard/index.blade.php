@extends('user.layout.index')
@section('meta')
<title>DASHBOARD | USER PANEL | GET 5X</title>
@endsection
@section('content')
<div class="product-big-title-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="product-bit-title text-center">
					<h2>DASHBOARD</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="promo-area" >
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="single-promo promo1">
                    <p>
                        @foreach (App\Models\Ticker::all() as $ticker)



                        {{$ticker->message}} .
        
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->
<div class="promo-area" style="margin-top: -70px!important;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="single-promo promo3">
                    <p><strong>Total Earning :</strong> PKR {{number_format(Auth::user()->totalEarning(), 2)}}</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->
@if(Auth::user()->withdraws)
<div class="promo-area" style="margin-top: -70px!important;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="single-promo promo2">
                    <p><strong>Total Withdraw :</strong> PKR {{number_format(Auth::user()->totalWithdraw(), 2)}}</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->
@endif
<div class="promo-area" style="margin-top: -70px!important;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo1">
                    <p>E-Wallet</p>
                    <p>PKR {{number_format(Auth::user()->balance, 2)}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo2">
                    {{-- <i class="fa fa-truck"></i> --}}
                    <p>Auto Wallet</p>
                    <p>PKR {{number_format(Auth::user()->auto_wallet, 2)}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo4">
                    <p>Total Reward Income</p>
                    <p>PKR {{Auth::user()->reward_income}}</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->
@if(Auth::user()->package)
<div class="promo-area" style="margin-top: -70px!important;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo1">
                    {{-- <i class="fa fa-truck"></i> --}}
                    <p>Package Subcription</p>
                    <p>{{Auth::user()->package->name}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo3">
                    {{-- <i class="fa fa-lock"></i> --}}
                    <p>Package Active On</p>
                    <p>{{Auth::user()->a_date->format('d M,Y')}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo4">
                    {{-- <i class="fa fa-lock"></i> --}}
                    <p>Remaining Product Amount</p>
                    <p>PKR {{Auth::user()->remainingProductPrice()}}</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->
@endif
<div class="promo-area" style="margin-top: -70px!important;">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="single-promo promo1">
                    <p>Total Referal</p>
                    <p>{{Auth::user()->refers->count()}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="{{url('user/left_refferal',Auth::user()->id)}}">
                    <div class="single-promo promo2" style="color:white;">
                        <p>Left Refferral</p>
                        <p>{{count(Auth::user()->getOrginalLeft())}}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <a href="{{url('user/right_refferal',Auth::user()->id)}}">
                    <div class="single-promo promo4" style="color:white;">
                        <p>Right Refferral</p>
                        <p>{{count(Auth::user()->getOrginalRight())}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->

@endsection

