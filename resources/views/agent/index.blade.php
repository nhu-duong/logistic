@extends('layouts.app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">
        Agents
    </h1>
</div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Agents
        </li>
    </ol>
@endsection

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agents as $cus)
                <tr id="agent_{{$cus->id}}">
                    <td>{{$cus->name}}</td>
                    <td>{{$cus->address}}</td>
                    <td>{{$cus->email}}</td>
                    <td>{{$cus->phone}}</td>
                    <td style="padding: 0; text-align: center;"><div>
                            <a href="{{route('edit_agent', ['id' => $cus->id])}}" class="label label-default"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="javascript:void(0);" title="Delete {{$cus->name}}" 
                                data-should-be-removed="#agent_{{$cus->id}}"
                                data-delete-url="{{route('delete_agent', ['id' => $cus->id])}}" 
                                class="label label-danger margin-left-5 delete-item">
                                 <i class="glyphicon glyphicon-remove"></i>
                            </a>
                        </div></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <a class="btn btn-primary" href="{{route('new_agent')}}">New</a>
        <div style="float: right;">{!! $agents->render() !!}</div>
    </div>
@endsection