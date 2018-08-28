<tr data-index="{{ $index }}">
    <td>{!! Form::text('cs_list_channels['.$index.'][name]', old('cs_list_channels['.$index.'][name]', isset($field) ? $field->name: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>