<tr>
    <td>{{$index + 1}}</td>
    <td><a href="{{route('download_attachment', ['id' => $attachment->id])}}" title="Download {{$attachment->file_name}}">{{$attachment->file_name}}</a></td>
    <td>{{$attachment->mime}}</td>
    <td>{{$attachment->getSize()}}</td>
    <td>{{$attachment->user->name}}</td>
    <td>{{$attachment->created_at}}</td>
    <td style="padding: 0; text-align: center;">
        <div>

            <a href="{{route('download_attachment', ['id' => $attachment->id])}}" title="Download {{$attachment->file_name}}" class="label label-default">
                <i class="glyphicon glyphicon-download"></i>
            </a>
            <a href="{{route('delete_attachment', ['id' => $attachment->id])}}" title="Delete {{$attachment->file_name}}" class="label label-default">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </td>
</tr>