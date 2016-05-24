{!! Form::open(array('url' => route('save_port', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $port->id }}">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $port->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address">Address:</label>
        <div class="col-sm-9">
            {!!Form::text('address', $port->address, ['class' => 'form-control', 'id' => 'address'])!!}
        </div>
    </div>
    
    @if (isset($hasSubmitBtn) && $hasSubmitBtn) 
    <input type="submit" class="btn btn-primary" value="Save" />
    <a href="{{route('list_port')}}" class="btn btn-default">Cancel</a>
    @endif
{!! Form::close() !!}