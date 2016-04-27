<tr id="attachment_{{$attachment->id}}">
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
            <a href="javascript:void(0);" title="Delete {{$attachment->file_name}}" 
               data-should-be-removed="#attachment_{{$attachment->id}}"
               data-delete-url="{{route('delete_attachment', ['id' => $attachment->id])}}" 
               class="label label-danger margin-left-5 delete-item">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </div>
    </td>
</tr>