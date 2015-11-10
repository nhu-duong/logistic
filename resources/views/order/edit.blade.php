@extends('app')

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
        {!! Form::open(array('url' => route('save_order', ['orderId' => $orderId]), 'class' => 'form-horizontal')) !!}
        <div id="tabs">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a href="#tabGeneralInformation" aria-controls="tabGeneralInformation" role="tab" data-toggle="tab">General Information</a></li>
                <li role="presentation">
                    <a href="#tabContainers" aria-controls="tabContainers" role="tab" data-toggle="tab">Containers</a></li>
                <li role="presentation">
                    <a href="#tabFiles" aria-controls="tabFiles" role="tab" data-toggle="tab">Files</a></li>
            </ul>
            <div class="tab-content">
                <div id="tabGeneralInformation" role="tabpanel" class="tab-pane margin-top-10 active">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {!! Form::hidden('master_bill_no', $order->master_bill_no, ['id' => 'master_bill_no']) !!}
                    {!! Form::hidden('house_bill_no', $order->house_bill_no, ['id' => 'house_bill_no']) !!}
                    {!! Form::hidden('order_type', $order->order_type, ['id' => 'order_type']) !!}
                    <div class="edit_order_form">
                        <div class="form-group">
                            <label class="control-label" for="remote_agent">Remote agent:</label>
                            <div class="control-container">
                                <div class="input-group">
                                    {!!Form::select('remote_agent', $agents, $order->remote_agent, ['class' => 'form-control', 'id' => 'remote_agent'])!!}
                                    <div class="input-group-addon"><span class="glyphicon glyphicon-plus" <="" span=""></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left" style="width: 50%;">
                            <div class="form-group">
                                <label class="control-label" for="seller">Seller / Shipper:</label>
                                <div class="control-container2">
                                    <div class="input-group">
                                        {!!Form::select('seller_id', $sellers, $order->seller_id, ['class' => 'form-control', 'id' => 'seller_id'])!!}
                                        <div class="input-group-addon showCreateForm" data-target-control="seller_id"
                                             data-create-form-url="{{route('new_address_ajax', ['forceType' => 'is_seller'])}}">
                                            <span class="glyphicon glyphicon-plus"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="control-container2">
                                    <textarea disabled="disabled" id="seller_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="ship">Ocean Vessel:</label>
                                <div class="control-container2">
                                    <div class="input-group">
                                        {!!Form::select('ship_id', $ships, $order->ship_id, ['class' => 'form-control', 'id' => 'ship_id'])!!}
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-plus" <="" span=""></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="shippemt_loading_port">Loading port:</label>
                                <div class="control-container2">
                                    <div class="input-group">
                                        {!!Form::select('loading_port_id', $ports, $order->loading_port_id, ['class' => 'form-control', 'id' => 'loading_port_id'])!!}
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-plus" <="" span=""></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="place_of_receipt">Place of receipt:</label>
                                <div class="control-container2">
                                    {!!Form::text('place_of_receipt', $order->place_of_receipt, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="shipped_onboard_date">Shipped on board:</label>
                                <div class="control-container2">
                                    {!! Form::input('date', 'shipped_onboard_date', $order->shipped_onboard_date, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="freight_payable_at">Freight:</label>
                                <div class="control-container2">
                                    <label class="radio-inline">
                                        {!! Form::radio('freight_payable_at', '1', $order->freight_payable_at == 1, ['style' => 'width: auto;']) !!} Prepaid
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('freight_payable_at', '2', $order->freight_payable_at == 2, ['style' => 'width: auto;']) !!} Collect
                                    </label>
                                </div>
                            </div>
                            <div>
                                <?php 
                                    $feeFields = [
                                        'fee_ocean_freight' => 'Ocean freight rate',
                                        'fee_do' => 'DO Fee',
                                        'fee_thc' => 'THC Fee',
                                        'fee_cic' => 'CIC Fee',
                                        'fee_cleaning' => 'Cleaning Fee',
                                        'fee_handling' => 'Handling Fee',
                                    ];
                                    foreach ($feeFields as $field => $label) { ?>

                                <div class="form-group">
                                    <label class="control-label" for="<?php echo $field; ?>"><?php echo $label; ?>:</label>
                                    <div class="control-container2">
                                        {!! Form::text($field, $order->$field, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                    <?php }
                                ?>
                            </div>
                        </div>
                        <div class="pull-right" style="width: 50%;">
                            <div class="form-group">
                                <label class="control-label" for="buyer">Buyer / Consignee:</label>
                                <div class="control-container2">
                                    <div class="input-group">
                                        {!!Form::select('buyer_id', $buyers, $order->buyer_id, ['class' => 'form-control', 'id' => 'buyer_id'])!!}
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-plus" <="" span=""></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="control-container2">
                                    <textarea disabled="disabled" id="buyer_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="notify_party_id">Notify Party:</label>
                                <div class="control-container2">
                                    <div class="input-group">
                                        {!!Form::select('notify_party_id', array_merge(['Same as Consignee'], $buyers), 0, ['class' => 'form-control', 'id' => 'notify_party_id'])!!}
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-plus" <="" span=""></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">&nbsp;</label>
                                <div class="control-container2">
                                    <textarea disabled="disabled" id="buyer_description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="voyage">Voyage:</label>
                                <div class="control-container2">
                                    {!! Form::text('shipment_voyage', $order->shipment_voyage, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="discharging_port">Discharging Port:</label>
                                <div class="control-container2">
                                    <div class="input-group">
                                        {!!Form::select('discharging_port_id', $ports, $order->discharging_port_id, ['class' => 'form-control', 'id' => 'discharging_port_id'])!!}
                                        <div class="input-group-addon"><span class="glyphicon glyphicon-plus" <="" span=""></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="place_of_delivery">Place of delivery:</label>
                                <div class="control-container2">
                                    {!!Form::text('place_of_delivery', $order->place_of_delivery, ['class' => 'form-control'])!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="arrival_date">Arrival date:</label>
                                <div class="control-container2">
                                    {!! Form::input('date', 'arrival_date', $order->arrival_date, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="shipment_container_no">Container no:</label>
                                <div class="control-container2">
                                    {!! Form::input('text', 'shipment_container_no', $order->shipment_container_no, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="shipment_seal_no">Seal no:</label>
                                <div class="control-container2">
                                    {!! Form::input('text', 'shipment_seal_no', $order->shipment_seal_no, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="description">Description:</label>
                                <div class="control-container2">
                                    {!! Form::textarea('description', $order->description, ['size' => '30x3', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="marks">Shipping Marks:</label>
                                <div class="control-container2">
                                    {!! Form::textarea('marks', $order->marks, ['size' => '30x3', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                            Packages / Weight / CBM (số khối) cubic meter
                        </div>
                    </div>
                </div>
                <div id="tabContainers" role="tabpanel" class="tab-pane margin-top-10">Tab Containers</div>
                <div id="tabFiles" role="tabpanel" class="tab-pane margin-top-10">Tab Files</div>
            </div>
            <div style="clear: both; margin-left: 30px;">
                <button type="submit" class="btn btn-default">Save</button>
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