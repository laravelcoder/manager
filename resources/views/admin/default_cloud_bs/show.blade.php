@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.default-cloud-b.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.default-cloud-b.fields.address')</th>
                            <td field-key='address'>{{ $default_cloud_b->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.default-cloud-b.fields.port')</th>
                            <td field-key='port'>{{ $default_cloud_b->port }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.default_cloud_bs.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


