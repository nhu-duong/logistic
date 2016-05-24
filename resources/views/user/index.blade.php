@extends('layouts.app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">
        Users <small>Manage users</small>
    </h1>
    <form name="search_order_form" method="GET" class="bill_no_form">
        <div class="pull-right bill_no_group">
            <input type="text" class="form-control" name="s" style="width: 250px;"
                   value="" placeholder="Enter house bill no or master bill no to search">
            <input type="submit" class="btn btn-primary" value="Search" />
        </div>
    </form>
</div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Users
        </li>
    </ol>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$roles[$user->role_id]}}</td>
                    <td>{{$user->phone}}</td>
                    <td style="padding: 0; text-align: center;"><div>
                            <a href="{{route('edit_user', ['userId' => $user->id])}}" class="label label-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="javascript:void(0);" class="label label-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{route('new_user', [])}}">New</a>
    </div>
@endsection
