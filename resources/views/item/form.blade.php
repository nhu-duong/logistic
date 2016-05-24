{!! Form::open(array('url' => route('save_item', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $item->id }}">
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $item->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="short_name">Short Name:</label>
        <div class="col-sm-9">
            {!!Form::text('short_name', $item->short_name, ['class' => 'form-control', 'id' => 'short_name'])!!}
        </div>
    </div>
    
    @if (isset($hasSubmitBtn) && $hasSubmitBtn) 
    <input type="submit" class="btn btn-primary" value="Save" />
    <a href="{{route('list_item')}}" class="btn btn-default">Cancel</a>
    @endif
{!! Form::close() !!}