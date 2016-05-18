{!! Form::open(array('url' => route('save_ship', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $ship->id }}">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $ship->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    
    @if (isset($hasSubmitBtn) && $hasSubmitBtn) 
    <input type="submit" class="btn btn-primary" value="Save" />
    @endif
{!! Form::close() !!}