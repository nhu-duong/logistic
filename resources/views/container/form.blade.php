{!! Form::open(array('url' => route('save_container', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $container->id }}">
    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <div class="form-group">
        <label class="control-label col-sm-3" for="container_no">Container No.:</label>
        <div class="col-sm-9">
            {!!Form::text('container_no', $container->container_no, ['class' => 'form-control', 'id' => 'container_no'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="seal_no">Seal No.:</label>
        <div class="col-sm-9">
            {!!Form::text('seal_no', $container->seal_no, ['class' => 'form-control', 'id' => 'seal_no'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cont_type">Container type:</label>
        <div class="col-sm-9">
            {!!Form::select('cont_type', App\Container::getContainerTypes(), $container->cont_type, ['class' => 'form-control', 'id' => 'cont_type'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="packages">Packages:</label>
        <div class="col-sm-9">
            {!!Form::text('packages', $container->packages, ['class' => 'form-control', 'id' => 'packages'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="weight">Weight:</label>
        <div class="col-sm-9">
            {!!Form::text('weight', $container->weight, ['class' => 'form-control', 'id' => 'weight'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="volume">Volume:</label>
        <div class="col-sm-9">
            {!!Form::text('volume', $container->volume, ['class' => 'form-control', 'id' => 'volume'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description">Description:</label>
        <div class="col-sm-9">
            {!!Form::textarea('description', $container->description, ['class' => 'form-control', 'id' => 'description'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="shipping_marks">Shipping Marks:</label>
        <div class="col-sm-9">
            {!!Form::textarea('shipping_marks', $container->shipping_marks, ['class' => 'form-control', 'id' => 'shipping_marks'])!!}
        </div>
    </div>
{!! Form::close() !!}