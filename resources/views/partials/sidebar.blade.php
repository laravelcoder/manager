@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>

            @can('cs_channel_list_access')
            <li>
                <a href="{{ route('admin.cs_channel_lists.index') }}">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.cs-channel-list.title')</span>
                </a>
            </li>@endcan
            
            @can('channel_servers_area_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.channel-servers-area.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('channel_server_access')
                    <li>
                        <a href="{{ route('admin.channel_servers.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.channel-server.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('csi_access')
                    <li>
                        <a href="{{ route('admin.csis.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.csi.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('cso_access')
                    <li>
                        <a href="{{ route('admin.csos.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.cso.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('sync_server_area_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.sync-server-area.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('sync_server_access')
                    <li>
                        <a href="{{ route('admin.sync_servers.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.sync-servers.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('configuration_setting_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.configuration-settings.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('ftp_access')
                            <li>
                                <a href="{{ route('admin.ftps.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.ftp.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('general_setting_access')
                            <li>
                                <a href="{{ route('admin.general_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.general-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('output_setting_access')
                            <li>
                                <a href="{{ route('admin.output_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.output-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('realtime_notification_access')
                            <li>
                                <a href="{{ route('admin.realtime_notifications.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.realtime-notification.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('report_setting_access')
                            <li>
                                <a href="{{ route('admin.report_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.report-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('filter_access')
                            <li>
                                <a href="{{ route('admin.filters.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.filters.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('clipdb_setting_access')
                            <li>
                                <a href="{{ route('admin.clipdb_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.clipdb-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('aggregation_server_setting_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.aggregation-server-settings.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('aggregation_server_access')
                            <li>
                                <a href="{{ route('admin.aggregation_servers.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.aggregation-server.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('baby_sync_server_access')
                            <li>
                                <a href="{{ route('admin.baby_sync_servers.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.baby-sync-servers.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                    @can('video_server_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.video-servers.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @can('video_server_type_access')
                            <li>
                                <a href="{{ route('admin.video_server_types.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.video-server-type.title')</span>
                                </a>
                            </li>@endcan
                            
                            @can('video_setting_access')
                            <li>
                                <a href="{{ route('admin.video_settings.index') }}">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('global.video-settings.title')</span>
                                </a>
                            </li>@endcan
                            
                        </ul>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('config_default_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>@lang('global.config-defaults.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('protocol_access')
                    <li>
                        <a href="{{ route('admin.protocols.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.protocols.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('country_access')
                    <li>
                        <a href="{{ route('admin.countries.index') }}">
                            <i class="fa fa-gears"></i>
                            <span>@lang('global.country.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('timezone_access')
                    <li>
                        <a href="{{ route('admin.timezones.index') }}">
                            <i class="fa fa-clock-o"></i>
                            <span>@lang('global.timezone.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('permission_access')
                    <li>
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.permissions.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('global.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('global.users.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('global.app_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

