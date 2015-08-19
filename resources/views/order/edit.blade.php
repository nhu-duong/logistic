@extends('app')

@section('title')
<div class="edit_order_title">
    <h1 class="pull-left">Create Order</h1>
    <form name="edit_order_form" action="{{route('save_order', ['orderId' => $orderId])}}" method="POST">
    <div class="pull-right bill_no_group">
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
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {!! Form::hidden('master_bill_no', $order->master_bill_no, ['id' => 'master_bill_no']) !!}
            {!! Form::hidden('house_bill_no', $order->house_bill_no, ['id' => 'house_bill_no']) !!}
            <div class="edit_order_form">
                <div class="form-group">
                    <label class="control-label" for="remote_agent">Remote agent:</label>
                    <div class="control-container">
                        {!!Form::select('remote_agent', $agents, $order->remote_agent, ['class' => 'form-control'])!!}
                    </div>
                </div>
                <div class="pull-left" style="width: 50%;">
                    <div class="form-group">
                        <label class="control-label" for="seller">Seller:</label>
                        <div class="control-container2">
                            {!!Form::select('seller_id', $sellers, $order->seller_id, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">&nbsp;</label>
                        <div class="control-container2">
                            <textarea disabled="disabled" id="seller_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ship">Ship:</label>
                        <div class="control-container2">
                            {!!Form::select('ship_id', $ships, $order->ship_id, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="shippemt_loading_port">Loading port:</label>
                        <div class="control-container2">
                            {!!Form::select('loading_port_id', $ports, $order->loading_port_id, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="shipped_onboard_date">Shipped on board:</label>
                        <div class="control-container2">
                            {!! Form::input('date', 'shipped_onboard_date', $order->shipped_onboard_date, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="freight_payable_at">Freight payable at:</label>
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
                                'fee_ocean_freight' => 'Fee ocean frieght',
                                'fee_do' => 'Fee DO',
                                'fee_thc' => 'Fee THC',
                                'fee_cic' => 'Fee CIC',
                                'fee_cleaning' => 'Fee Cleaning',
                                'fee_handling' => 'Fee Handling',
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
                        <label class="control-label" for="buyer">Buyer:</label>
                        <div class="control-container2">
                            {!!Form::select('buyer_id', $buyers, $order->buyer_id, ['class' => 'form-control'])!!}
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
                            {!!Form::select('discharging_port_id', $ports, $order->discharging_port_id, ['class' => 'form-control'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="arrival_date">Arrival date:</label>
                        <div class="control-container2">
                            {!! Form::input('date', 'arrival_date', $order->arrival_date, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="description">Description:</label>
                        <div class="control-container2">
                            {!! Form::textarea('description', $order->description, ['size' => '30x3', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="marks">Marks:</label>
                        <div class="control-container2">
                            {!! Form::text('marks', $order->marks, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: both;">
                <button type="submit" class="btn btn-default">Submit Button</button>
            </div>
        <!--</form>-->
        {!! Form::close() !!}
    </div>
@endsection
