@extends('app')

@section('title')
<h1 class="page-header">
    Orders <small>Search orders</small>
</h1>
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
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Master Bill</th>
                    <th>House Bill</th>
                    <th title="Shipped Onboard Date">ETD</th>
                    <th title="Arrival Date">ETA</th>
                    <th>Seller</th>
                    <th>Delivery Date</th>
                    <th>Buyer</th>
                    <th>Weight</th>
                    <th>Volume</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>VNL2267</td>
                    <td>TCL2267TH764</td>
                    <td>10/04/2015</td>
                    <td>15/05/2015</td>
                    <td>WINSOME GREEN CO.,LTD, THAILAND</td>
                    <td>18/05/2015</td>
                    <td>HONG TAN PHAT CO.,LTD. VIETNAM</td>
                    <td>16,317.610 KGS</td>
                    <td>45.200 M3</td>
                    <td style="padding: 0; text-align: center;"><div>
                            <a href="javascript:void(0);" class="label label-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="javascript:void(0);" class="label label-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </div></td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{route('edit_order', ['orderId' => 0])}}">New</a>
    </div>
@endsection
