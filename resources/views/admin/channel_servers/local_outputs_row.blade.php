<tr data-index="{{ $index }}">
    <td>{!! Form::text('local_outputs['.$index.'][address]', old('local_outputs['.$index.'][address]', isset($field) ? $field->address: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('local_outputs['.$index.'][port]', old('local_outputs['.$index.'][port]', isset($field) ? $field->port: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>