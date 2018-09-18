{!! Form::open(array('url' => route('save_agent', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $agent->id }}">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $agent->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address">Address:</label>
        <div class="col-sm-9">
            {!!Form::text('address', $agent->address, ['class' => 'form-control', 'id' => 'address'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email">Email:</label>
        <div class="col-sm-9">
            {!!Form::text('email', $agent->email, ['class' => 'form-control', 'id' => 'email'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone">Phone:</label>
        <div class="col-sm-9">
            {!!Form::text('phone', $agent->phone, ['class' => 'form-control', 'id' => 'phone'])!!}
        </div>
    </div>
    
    @if (isset($hasSubmitBtn) && $hasSubmitBtn) 
    <input type="submit" class="btn btn-primary" value="Save" />
    <a href="{{route('list_agent')}}" class="btn btn-default">Cancel</a>
    @endif
{!! Form::close() !!}