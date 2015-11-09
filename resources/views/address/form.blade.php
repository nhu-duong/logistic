{!! Form::open(array('url' => route('save_address', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $address->id }}">
    <!-- `id`, `name`, `short_name`, `address`, `email`, `phone`, `fax`, `is_buyer`, `is_seller`, `is_agent`, `created_at`, `updated_at` -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="remote_agent">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="remote_agent">Short name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="remote_agent">Address:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="remote_agent">Email:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="remote_agent">Phone:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="remote_agent">Fax:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <?php $checkBoxes = ['is_buyer' => 'Is Buyer', 'is_seller' => 'Is Seller', 'is_agent' => 'Is Agent']; ?>
    @foreach ($checkBoxes as $key => $name)
    <?php $checkBoxAttrs = [];
    if (array_key_exists($key, $forceType) && $forceType[$key] == 1) { 
        $checkBoxAttrs['readonly'] = 'readonly';
    }
    ?>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox">
                <label>
                    {!!Form::checkbox($key, '1', $address->$key, $checkBoxAttrs)!!} {{$name}}
                </label>
            </div>
        </div>
    </div>
    @endforeach
{!! Form::close() !!}