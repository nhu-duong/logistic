@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Activity Logs</div>

                    <div class="panel-body">
                        <table style="width: 100%;" class="table">
                            <tr>
                                <th>User ID</th>
                                <th>Type</th>
                                <th>Value 1</th>
                                <th>Value 2</th>
                                <th>Image</th>
                                <th>Updated Date</th>
                            </tr>
                            @forelse($records as $r)
                            <tr>
                                <td>{{$r->user_id}}</td>
                                <td>{{$types[$r->record_type]}}</td>
                                <td>{{$r->value}}</td>
                                <td>{{$r->value_2}}</td>
                                <td>
                                    @if ($r->image)
                                    <img src="{{URL::to('/uploads//' . $r->image)}}" width="300px" />
                                    @endif
                                </td>
                                <td>{{$r->created_at}}</td>
                            </tr>
                            @empty
                                No record found.
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
