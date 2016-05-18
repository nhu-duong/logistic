@extends('layouts.app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">Create/Edit Ship</h1>
</div>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i> Ship
        </li>
    </ol>
@endsection

@section('content')
    @include('ship.form')
@endsection