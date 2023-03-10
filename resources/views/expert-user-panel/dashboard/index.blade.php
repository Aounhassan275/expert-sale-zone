@extends('expert-user-panel.layout.index')
@section('title')
Dashboard
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="body"> 
                <p>
                    @foreach (App\Models\Ticker::all() as $ticker)
                    {{$ticker->message}} .
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon indigo"><i class="zmdi zmdi-settings"></i></div>
                <h4 class="mt-3">45.8k</h4>
                <span class="text-muted">Total Views</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>175.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon pink"><i class="zmdi zmdi-bug"></i></div>
                <h4 class="mt-3">12.1k</h4>
                <span class="text-muted">Bugs Fixed</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>15.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon orange"><i class="zmdi zmdi-shopping-cart"></i></div>
                <h4 class="mt-3">53.8k</h4>
                <span class="text-muted">Total Sales</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>25.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon green"><i class="zmdi zmdi-headset-mic"></i></div>
                <h4 class="mt-3">17.2k</h4>
                <span class="text-muted">Support Cost</span>
                <div class="w_description text-danger">
                    <i class="zmdi zmdi-trending-down"></i>
                    <span>25.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon cyan"><i class="zmdi zmdi-ticket-star"></i></div>
                <h4 class="mt-3">01.8k</h4>
                <span class="text-muted">Submitted Tickers</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>95.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon dark"><i class="zmdi zmdi-card"></i></div>
                <h4 class="mt-3">50M</h4>
                <span class="text-muted">Cash Deposits</span>
                <div class="w_description text-success">
                    <i class="zmdi zmdi-trending-up"></i>
                    <span>15.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon blue"><i class="zmdi zmdi-dns"></i></div>
                <h4 class="mt-3">89</h4>
                <span class="text-muted">Server Allocation</span>
                <div class="w_description text-danger">
                    <i class="zmdi zmdi-trending-down"></i>
                    <span>56.5%</span>
                </div>
           </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card w_data_1">
           <div class="body">
                <div class="w_icon blush"><i class="zmdi zmdi-headset-mic"></i></div>
                <h4 class="mt-3">17.2k</h4>
                <span class="text-muted">Support Cost</span>
                <div class="w_description text-danger">
                    <i class="zmdi zmdi-trending-down"></i>
                    <span>25.5%</span>
                </div>
           </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon traffic">
            <div class="body">
                <h6>Traffic</h6>
                <h2>20 <small class="info">of 1Tb</small></h2>
                <small>4% higher than last month</small>
                <div class="progress">
                    <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon sales">
            <div class="body">
                <h6>Sales</h6>
                <h2>12% <small class="info">of 100</small></h2>
                <small>6% higher than last month</small>
                <div class="progress">
                    <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon email">
            <div class="body">
                <h6>Email</h6>
                <h2>39 <small class="info">of 100</small></h2>
                <small>Total Registered email</small>
                <div class="progress">
                    <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 big_icon domains">
            <div class="body">
                <h6>Domains</h6>
                <h2>8 <small class="info">of 10</small></h2>
                <small>Total Registered Domain</small>
                <div class="progress">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Recent</strong> Orders</h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-hover c_table">
                    <thead>
                        <tr>
                            <th style="width:60px;">#</th>
                            <th>Name</th>
                            <th>Item</th>
                            <th>Address</th>
                            <th>Quantity</th>                                    
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{asset('http://via.placeholder.com/60x40')}}" alt="Product img"></td>
                            <td>Camara</td>
                            <td>NOKIA-8</td>
                            <td>2595 Pearlman Avenue Sudbury, MA 01776 </td>
                            <td>3</td>
                            <td><span class="badge badge-success">DONE</span></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('http://via.placeholder.com/60x40')}}" alt="Product img"></td>
                            <td>Maryam</td>
                            <td>NOKIA-456</td>
                            <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                            <td>4</td>
                            <td><span class="badge badge-success">DONE</span></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('http://via.placeholder.com/60x40')}}" alt="Product img"></td>
                            <td>Micheal</td>
                            <td>SAMSANG PRO</td>
                            <td>508 Virginia Street Chicago, IL 60653</td>
                            <td>1</td>
                            <td><span class="badge badge-success">DONE</span></td>
                        </tr>
                        <tr>
                            <td><img src="{{asset('http://via.placeholder.com/60x40')}}" alt="Product img"></td>
                            <td>Frank</td>
                            <td>NOKIA-456</td>
                            <td>1516 Holt Street West Palm Beach, FL 33401</td>
                            <td>13</td>
                            <td><span class="badge badge-warning">PENDING</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    

@endsection

