<div id="tabGeneralInformation" role="tabpanel" class="tab-pane margin-top-10 active">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! Form::hidden('master_bill_no', $order->master_bill_no, ['id' => 'master_bill_no', 'required' => 'required']) !!}
    {!! Form::hidden('house_bill_no', $order->house_bill_no, ['id' => 'house_bill_no', 'required' => 'required']) !!}
    {!! Form::hidden('order_type', $order->order_type, ['id' => 'order_type']) !!}
    <div class="edit_order_form">
        <div class="form-group">
            <label class="control-label" for="remote_agent">Remote agent:</label>
            <div class="control-container">
                <div class="input-group">
                    {!!Form::select('remote_agent', $agents, $order->remote_agent, ['class' => 'form-control', 'id' => 'remote_agent'])!!}
                    <div class="input-group-addon showCreateForm" data-target-control="remote_agent"
                             data-create-form-url="{{route('new_agent_ajax')}}">
                            <span class="glyphicon glyphicon-plus"></span></div>
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
                        <div class="input-group-addon showCreateForm" data-target-control="ship_id"
                             data-create-form-url="{{route('new_ship_ajax')}}">
                            <span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="shippemt_loading_port">Loading port:</label>
                <div class="control-container2">
                    <div class="input-group">
                        {!!Form::select('loading_port_id', $ports, $order->loading_port_id, ['class' => 'form-control', 'id' => 'loading_port_id'])!!}
                        <div class="input-group-addon showCreateForm" data-target-control="loading_port_id"
                             data-create-form-url="{{route('new_port_ajax')}}">
                            <span class="glyphicon glyphicon-plus"></span></div>
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
                        <div class="input-group-addon showCreateForm" data-target-control="buyer_id"
                             data-create-form-url="{{route('new_address_ajax', ['forceType' => 'is_buyer'])}}">
                            <span class="glyphicon glyphicon-plus"></span></div>
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
                        <div class="input-group-addon showCreateForm" data-target-control="discharging_port_id"
                             data-create-form-url="{{route('new_port_ajax')}}">
                            <span class="glyphicon glyphicon-plus"></span></div>
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
    <div style="clear: both; margin-left: 30px;">
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{route('list_orders')}}" class="btn btn-default">Cancel</a>
    </div>
</div>
                