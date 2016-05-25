@extends('layouts.app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">Create Order</h1>
    <form name="edit_order_form" action="{{route('save_order', ['orderId' => $orderId])}}" method="POST" class="bill_no_form">
    <div class="pull-right bill_no_group">
        <select class="form-control update-hidden" data-target="order_type">
            <option value="1" <?php echo $order->order_type == 1 ? 'selected="selected"' : ''; ?> >Import</option>
            <option value="2" <?php echo $order->order_type == 2 ? 'selected="selected"' : ''; ?> >Export</option></select>
        /
        <input type="text" class="form-control update-hidden" data-target="master_bill_no" 
               value="{{$order->master_bill_no}}" placeholder="Enter master bill no">
        /
        <input type="text" class="form-control update-hidden" data-target="house_bill_no" 
               value="{{$order->house_bill_no}}" placeholder="Enter house bill no">
    </div>
    </form>
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
    <div class="edit_order_form_wrapper">
        {!! Form::open(array('url' => route('save_order', ['orderId' => $orderId]), 'class' => 'form-horizontal', 'id' => 'orderForm')) !!}
        <div id="tabs">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a href="#tabGeneralInformation" aria-controls="tabGeneralInformation" role="tab" data-toggle="tab">General Information</a></li>
                @if($order->id)
                <li role="presentation">
                    <a href="#tabContainers" aria-controls="tabContainers" role="tab" data-toggle="tab">Containers</a></li>
                <li role="presentation">
                    <a href="#tabFiles" aria-controls="tabFiles" role="tab" data-toggle="tab">Files</a></li>
                @endif
            </ul>
            <div class="tab-content">
                @include('order.tabs.general')
                @if($order->id)
                    @include('order.tabs.containers')
                    @include('order.tabs.attachments')
                @endif
            </div>
        </div>
        <!--</form>-->
        {!! Form::close() !!}
    </div>
@endsection

@section('customCreateFormModal')
<div id="customCreateFormModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveCustomForm">Save</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
@endsection