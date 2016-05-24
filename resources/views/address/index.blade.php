@extends('layouts.app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">
        Customers
    </h1>
</div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Customers
        </li>
    </ol>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Short Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Is Buyer</th>
                    <th>Is Seller</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $cus)
                <tr id="address_{{$cus->id}}">
                    <td>{{$cus->name}}</td>
                    <td>{{$cus->short_name}}</td>
                    <td>{{$cus->address}}</td>
                    <td>{{$cus->email}}</td>
                    <td>{{$cus->phone}}</td>
                    <td>{{$cus->fax}}</td>
                    <td>{{$cus->is_buyer ? 'Yes' : 'No'}}</td>
                    <td>{{$cus->is_seller ? 'Yes' : 'No'}}</td>
                    <td style="padding: 0; text-align: center;"><div>
                            <a href="{{route('edit_address', ['id' => $cus->id])}}" class="label label-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="javascript:void(0);" title="Delete {{$cus->name}}" 
                                data-should-be-removed="#address_{{$cus->id}}"
                                data-delete-url="{{route('delete_address', ['id' => $cus->id])}}" 
                                class="label label-danger margin-left-5 delete-item">
                                 <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <a class="btn btn-primary" href="{{route('new_address')}}">New</a>
        <div style="float: right;">{!! $addresses->render() !!}</div>
    </div>
@endsection