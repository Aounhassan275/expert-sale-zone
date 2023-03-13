@extends('admin.layout.index')
@section('contents')

<div class="row mb-2 mb-xl-4">
    <div class="col-auto d-none d-sm-block">
    <h3> EDIT PACKAGE | {{App\Models\Setting::siteName()}}</h3>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Package</h5>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.update',$package->id)}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Name</label>
                            <input type="name" name="name" class="form-control" placeholder="Package Name" value="{{$package->name}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Price</label>
                            <input type="number" class="form-control" name="price"  placeholder="Package Price" value="{{$package->price}}">
                        </div>
                   </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Direct Income</label>
                            <input type="number" class="form-control" name="direct_income"  placeholder="Package Direct Income" value="{{$package->direct_income}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Indirect Income</label>
                            <input type="number" class="form-control" name="indirect_income"  placeholder="Package Indirect Income" value="{{$package->indirect_income}}">
                        </div>
                    </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Package Indirect Level</label>
                             <input type="number" max="14" min="1" class="form-control" name="indirect_income_level"  placeholder="Package Indirect Income Level" value="{{$package->indirect_income_level}}">
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Package Product Income</label>
                             <input type="number" class="form-control" name="product_income"  placeholder="Package Product Income" value="{{$package->product_income}}">
                         </div>
                     </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Package Expense Income</label>
                             <input type="number"class="form-control" name="expense_income"  placeholder="Package Expense Income" value="{{$package->expense_income}}">
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Package Flash Income</label>
                             <input type="number" class="form-control" name="flash_income"  placeholder="Package Flash Income" value="{{$package->flash_income}}">
                         </div>
                     </div>
                    <div class="row">
                         <div class="form-group col-6">
                             <label class="form-label">Package Reward Income</label>
                             <input type="number"class="form-control" name="reward_income"  placeholder="Package Reward Income" value="{{$package->reward_income}}">
                         </div>
                         <div class="form-group col-6">
                             <label class="form-label">Package Salary</label>
                             <input type="number" class="form-control" name="salary"  placeholder="Package Salary" value="{{$package->salary}}">
                         </div>
                     </div>
                   <div class="row">
                        <div class="form-group col-6">
                            <label class="form-label">Package Withdraw Limit</label>
                            <input type="number" class="form-control" name="withdraw_limit"  placeholder="Package Withdraw Limit" value="{{$package->withdraw_limit}}">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Package Income Limit</label>
                            <input type="number" class="form-control" name="income_limit"  placeholder="Package Income Limit" value="{{$package->income_limit}}">
                        </div>
                   </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection