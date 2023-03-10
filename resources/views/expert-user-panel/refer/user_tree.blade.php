@extends('user.layout.index')
@section('meta')
<title>{{$user->name}} TREE | USER PANEL | GET 5X</title>
@endsection
@section('content')

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" align="center" border="0" style="text-align:center">
                    <tr height="150">
                            <td><span class="badge badge-success">{{count($user->getOrginalLeft())}}</span></td>
                            <td colspan="2"><i class="fa fa-user fa-4x" style="color:#8a9ced"></i><p>{{$user->name}}</p></td>
                            <td><span class="badge badge-success">{{count($user->getOrginalRight())}}</span></td>
                        </tr>
                        <tr height="150">
                            <td colspan="2">
                                @if($user->left_refferal != null)
                                    <i class="fa fa-user fa-4x" style="color:#20d5b1"></i>
                                    <p>
                                        <a href="{{route('user.tree.show',$user->left_refferal)}}" > 
                                            {{@$user->refer_by_name(@$user->left_refferal)}}
                                        </a>
                                    </p>
                                @endif
                            </td>
                            <td colspan="2">
                                @if($user->right_refferal != null)
                                    <i class="fa fa-user fa-4x" style="color:#20d5b1"></i>
                                    <p>
                                        <a href="{{route('user.tree.show',$user->right_refferal)}}"> 
                                            {{@$user->refer_by_name(@$user->right_refferal)}}
                                        </a>
                                    </p>
                                @endif
                            </td>
                        </tr>
                        <tr height="150">
                            <td>
                                @if(@$left && $left->left_refferal != null)
                                    <i class="fa fa-user fa-4x" style="color:#943cc6"></i>
                                    <p>
                                        <a href="{{route('user.tree.show',$left->left_refferal)}}"> 
                                            {{@$left->refer_by_name(@$left->left_refferal)}}
                                        </a>
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if(@$left && $left->right_refferal != null)
                                    <i class="fa fa-user fa-4x" style="color:#943cc6"></i>                
                                    <p>
                                        <a href="{{route('user.tree.show',$left->right_refferal)}}"> 
                                            {{@$left->refer_by_name(@$left->right_refferal)}}
                                        </a>
                                    </p>
                                @endif
                            </td>
                            <td>
                                @if(@$right && @$right->left_refferal != null)
                                <i class="fa fa-user fa-4x" style="color:#943cc6"></i>
                                <p>
                                    <a href="{{route('user.tree.show',$right->left_refferal)}}"> 
                                        {{$right->refer_by_name($right->left_refferal)}}
                                    </a>
                                </p>
                                @endif
                            </td>
                            <td>
                                @if(@$right && @$right->right_refferal != null)
                                <i class="fa fa-user fa-4x" style="color:#943cc6"></i>
                                <p>
                                    <a href="{{route('user.tree.show',$right->right_refferal)}}"> 
                                        {{$right->refer_by_name(@$right->right_refferal)}}
                                    </a>
                                </p>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection