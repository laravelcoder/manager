<tr data-index="{{ $index }}">
    <td>{!! Form::text('default_cloud_as['.$index.'][address]', old('default_cloud_as['.$index.'][address]', isset($field) ? $field->address: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('default_cloud_as['.$index.'][port]', old('default_cloud_as['.$index.'][port]', isset($field) ? $field->port: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>