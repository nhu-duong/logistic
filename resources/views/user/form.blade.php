{!! Form::open(array('url' => route('save_user', []), 'class' => 'form-horizontal')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $user->id }}">
    <!-- `id`, `name`, `short_name`, `address`, `email`, `phone`, `fax`, `is_buyer`, `is_seller`, `is_agent`, `created_at`, `updated_at` -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Name:</label>
        <div class="col-sm-9">
            {!!Form::text('name', $user->name, ['class' => 'form-control', 'id' => 'name'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email">Email:</label>
        <div class="col-sm-9">
            {!!Form::text('email', $user->email, ['class' => 'form-control', 'id' => 'email'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone">Phone:</label>
        <div class="col-sm-9">
            {!!Form::text('phone', $user->phone, ['class' => 'form-control', 'id' => 'phone'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone">Role:</label>
        <div class="col-sm-9">
            {!!Form::select('role_id', $user->getRoles(), $user->role_id, ['class' => 'form-control', 'id' => 'role_id'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone">Password:</label>
        <div class="col-sm-9">
            {!!Form::text('password', '', ['class' => 'form-control', 'id' => 'password'])!!}
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Save" />
    <a href="{{route('list_user')}}" class="btn btn-default">Cancel</a>
{!! Form::close() !!}