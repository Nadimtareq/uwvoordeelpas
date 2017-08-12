@foreach($data as $data)
<tr>
    <td>
        <div class="ui child checkbox">
        	<input type="checkbox" name="id[]" value="{{ $data->id }}">
        	<label></label>
        </div>
    </td>
    <td>{{ $data->name }}</td>
    <td>{{ $data->email }}</td>
    <td>{{ $data->subject }}</td>
    <td>{{ $data->content }}</td>
    <td><a href="{{ url("admin/contact/read/" . $data->id) }}" class="btn btn-success">Gelezen</a></td>
    {{--<td><a href="{{ url('admin/'.$slugController.'/update/'.$data->id) }}" class="ui label"><i class="pencil icon"></i> Bewerk</a></td>--}}
</tr>
@endforeach