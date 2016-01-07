<tr id="cont_{{$cont->id}}">
    <td>{{$cont->id}}</td>
    <td>{{$cont->container_no}}</td>
    <td>{{$cont->seal_no}}</td>
    <td>{{$cont->cont_type}}</td>
    <td>{{$cont->getPackages()}}</td>
    <td>{{$cont->getWeight()}}</td>
    <td>{{$cont->getVolume()}}</td>
    <td style="padding: 0; text-align: center;"><div>
            <a href="javascript:void(0);" class="label label-danger delete-cont" 
               data-url="{{route('delete_container', ['id' => $cont->id])}}"><i class="glyphicon glyphicon-remove"></i></a>
        </div></td>
</tr>