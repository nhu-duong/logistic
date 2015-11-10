{!! Form::open(array('url' => route('save_address', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $address->id }}">
    <!-- `id`, `name`, `short_name`, `address`, `email`, `phone`, `fax`, `is_buyer`, `is_seller`, `is_agent`, `created_at`, `updated_at` -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $address->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="shortname">Short name:</label>
        <div class="col-sm-9">
            {!!Form::text('shortname', $address->shortname, ['class' => 'form-control', 'id' => 'shortname'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address">Address:</label>
        <div class="col-sm-9">
            {!!Form::text('address', $address->address, ['class' => 'form-control', 'id' => 'address'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email">Email:</label>
        <div class="col-sm-9">
            {!!Form::text('email', $address->email, ['class' => 'form-control', 'id' => 'email'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone">Phone:</label>
        <div class="col-sm-9">
            {!!Form::text('phone', $address->phone, ['class' => 'form-control', 'id' => 'phone'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="fax">Fax:</label>
        <div class="col-sm-9">
            {!!Form::text('fax', $address->fax, ['class' => 'form-control', 'id' => 'fax'])!!}
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