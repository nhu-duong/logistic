@extends('app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">Create Order</h1>
    <div class="pull-right bill_no_group">
        <input type="text" class="form-control" id="master_bill_no" name="master_bill_no" placeholder="Enter master bill no">
        /
        <input type="text" class="form-control" id="house_bill_no" name="house_bill_no" placeholder="Enter house bill no">
    </div>
</div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Orders
        </li>
    </ol>
@endsection

@section('content')
    <div class="table-responsive">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="control-label col-sm-2" for="remote_agent">Remote agent:</label>
                <div class="col-sm-10">
                    <select name="remote_agent" id="remote_agent">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </form>
    </div>
@endsection
