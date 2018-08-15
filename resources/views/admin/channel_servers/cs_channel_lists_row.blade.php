<tr data-index="{{ $index }}">
    <td>{!! Form::text('cs_channel_lists['.$index.'][channel_name]', old('cs_channel_lists['.$index.'][channel_name]', isset($field) ? $field->channel_name: ''), ['class' => 'form-control']) !!}</td>
<td>{!! Form::text('cs_channel_lists['.$index.'][channel_type]', old('cs_channel_lists['.$index.'][channel_type]', isset($field) ? $field->channel_type: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>