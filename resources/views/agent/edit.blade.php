@extends('app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">Create/Edit Agent</h1>
</div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Agent
        </li>
    </ol>
@endsection

@section('content')
    @include('agent.form')
@endsection