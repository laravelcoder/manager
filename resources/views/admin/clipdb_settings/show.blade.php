@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clipdb-settings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clipdb-settings.fields.clip-db-url')</th>
                            <td field-key='clip_db_url'>{{ $clipdb_setting->clip_db_url }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clipdb_settings.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


