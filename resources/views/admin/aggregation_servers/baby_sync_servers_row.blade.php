<tr data-index="{{ $index }}">
    <td>{!! Form::text('baby_sync_servers['.$index.'][baby_sync_server]', old('baby_sync_servers['.$index.'][baby_sync_server]', isset($field) ? $field->baby_sync_server: ''), ['class' => 'form-control']) !!}</td>

    <td>
        <a href="#" class="remove btn btn-xs btn-danger">@lang('quickadmin.qa_delete')</a>
    </td>
</tr>