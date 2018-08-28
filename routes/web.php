<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('channel_servers', 'Admin\ChannelServersController');
    Route::post('channel_servers_mass_destroy', ['uses' => 'Admin\ChannelServersController@massDestroy', 'as' => 'channel_servers.mass_destroy']);
    Route::post('channel_servers_restore/{id}', ['uses' => 'Admin\ChannelServersController@restore', 'as' => 'channel_servers.restore']);
    Route::delete('channel_servers_perma_del/{id}', ['uses' => 'Admin\ChannelServersController@perma_del', 'as' => 'channel_servers.perma_del']);
    Route::resource('cs_list_channels', 'Admin\CsListChannelsController');
    Route::post('cs_list_channels_mass_destroy', ['uses' => 'Admin\CsListChannelsController@massDestroy', 'as' => 'cs_list_channels.mass_destroy']);
    Route::post('cs_list_channels_restore/{id}', ['uses' => 'Admin\CsListChannelsController@restore', 'as' => 'cs_list_channels.restore']);
    Route::delete('cs_list_channels_perma_del/{id}', ['uses' => 'Admin\CsListChannelsController@perma_del', 'as' => 'cs_list_channels.perma_del']);
    Route::resource('csis', 'Admin\CsisController');
    Route::post('csis_mass_destroy', ['uses' => 'Admin\CsisController@massDestroy', 'as' => 'csis.mass_destroy']);
    Route::post('csis_restore/{id}', ['uses' => 'Admin\CsisController@restore', 'as' => 'csis.restore']);
    Route::delete('csis_perma_del/{id}', ['uses' => 'Admin\CsisController@perma_del', 'as' => 'csis.perma_del']);
    Route::resource('csos', 'Admin\CsosController');
    Route::post('csos_mass_destroy', ['uses' => 'Admin\CsosController@massDestroy', 'as' => 'csos.mass_destroy']);
    Route::post('csos_restore/{id}', ['uses' => 'Admin\CsosController@restore', 'as' => 'csos.restore']);
    Route::delete('csos_perma_del/{id}', ['uses' => 'Admin\CsosController@perma_del', 'as' => 'csos.perma_del']);
    Route::resource('sync_servers', 'Admin\SyncServersController');
    Route::post('sync_servers_mass_destroy', ['uses' => 'Admin\SyncServersController@massDestroy', 'as' => 'sync_servers.mass_destroy']);
    Route::post('sync_servers_restore/{id}', ['uses' => 'Admin\SyncServersController@restore', 'as' => 'sync_servers.restore']);
    Route::delete('sync_servers_perma_del/{id}', ['uses' => 'Admin\SyncServersController@perma_del', 'as' => 'sync_servers.perma_del']);
    Route::resource('ftps', 'Admin\FtpsController');
    Route::post('ftps_mass_destroy', ['uses' => 'Admin\FtpsController@massDestroy', 'as' => 'ftps.mass_destroy']);
    Route::post('ftps_restore/{id}', ['uses' => 'Admin\FtpsController@restore', 'as' => 'ftps.restore']);
    Route::delete('ftps_perma_del/{id}', ['uses' => 'Admin\FtpsController@perma_del', 'as' => 'ftps.perma_del']);
    Route::resource('general_settings', 'Admin\GeneralSettingsController');
    Route::post('general_settings_mass_destroy', ['uses' => 'Admin\GeneralSettingsController@massDestroy', 'as' => 'general_settings.mass_destroy']);
    Route::post('general_settings_restore/{id}', ['uses' => 'Admin\GeneralSettingsController@restore', 'as' => 'general_settings.restore']);
    Route::delete('general_settings_perma_del/{id}', ['uses' => 'Admin\GeneralSettingsController@perma_del', 'as' => 'general_settings.perma_del']);
    Route::resource('output_settings', 'Admin\OutputSettingsController');
    Route::post('output_settings_mass_destroy', ['uses' => 'Admin\OutputSettingsController@massDestroy', 'as' => 'output_settings.mass_destroy']);
    Route::post('output_settings_restore/{id}', ['uses' => 'Admin\OutputSettingsController@restore', 'as' => 'output_settings.restore']);
    Route::delete('output_settings_perma_del/{id}', ['uses' => 'Admin\OutputSettingsController@perma_del', 'as' => 'output_settings.perma_del']);
    Route::resource('realtime_notifications', 'Admin\RealtimeNotificationsController');
    Route::post('realtime_notifications_mass_destroy', ['uses' => 'Admin\RealtimeNotificationsController@massDestroy', 'as' => 'realtime_notifications.mass_destroy']);
    Route::post('realtime_notifications_restore/{id}', ['uses' => 'Admin\RealtimeNotificationsController@restore', 'as' => 'realtime_notifications.restore']);
    Route::delete('realtime_notifications_perma_del/{id}', ['uses' => 'Admin\RealtimeNotificationsController@perma_del', 'as' => 'realtime_notifications.perma_del']);
    Route::resource('report_settings', 'Admin\ReportSettingsController');
    Route::post('report_settings_mass_destroy', ['uses' => 'Admin\ReportSettingsController@massDestroy', 'as' => 'report_settings.mass_destroy']);
    Route::post('report_settings_restore/{id}', ['uses' => 'Admin\ReportSettingsController@restore', 'as' => 'report_settings.restore']);
    Route::delete('report_settings_perma_del/{id}', ['uses' => 'Admin\ReportSettingsController@perma_del', 'as' => 'report_settings.perma_del']);
    Route::resource('filters', 'Admin\FiltersController');
    Route::post('filters_mass_destroy', ['uses' => 'Admin\FiltersController@massDestroy', 'as' => 'filters.mass_destroy']);
    Route::post('filters_restore/{id}', ['uses' => 'Admin\FiltersController@restore', 'as' => 'filters.restore']);
    Route::delete('filters_perma_del/{id}', ['uses' => 'Admin\FiltersController@perma_del', 'as' => 'filters.perma_del']);
    Route::resource('clipdb_settings', 'Admin\ClipdbSettingsController');
    Route::post('clipdb_settings_mass_destroy', ['uses' => 'Admin\ClipdbSettingsController@massDestroy', 'as' => 'clipdb_settings.mass_destroy']);
    Route::post('clipdb_settings_restore/{id}', ['uses' => 'Admin\ClipdbSettingsController@restore', 'as' => 'clipdb_settings.restore']);
    Route::delete('clipdb_settings_perma_del/{id}', ['uses' => 'Admin\ClipdbSettingsController@perma_del', 'as' => 'clipdb_settings.perma_del']);
    Route::resource('aggregation_servers', 'Admin\AggregationServersController');
    Route::post('aggregation_servers_mass_destroy', ['uses' => 'Admin\AggregationServersController@massDestroy', 'as' => 'aggregation_servers.mass_destroy']);
    Route::post('aggregation_servers_restore/{id}', ['uses' => 'Admin\AggregationServersController@restore', 'as' => 'aggregation_servers.restore']);
    Route::delete('aggregation_servers_perma_del/{id}', ['uses' => 'Admin\AggregationServersController@perma_del', 'as' => 'aggregation_servers.perma_del']);
    Route::resource('baby_sync_servers', 'Admin\BabySyncServersController');
    Route::post('baby_sync_servers_mass_destroy', ['uses' => 'Admin\BabySyncServersController@massDestroy', 'as' => 'baby_sync_servers.mass_destroy']);
    Route::post('baby_sync_servers_restore/{id}', ['uses' => 'Admin\BabySyncServersController@restore', 'as' => 'baby_sync_servers.restore']);
    Route::delete('baby_sync_servers_perma_del/{id}', ['uses' => 'Admin\BabySyncServersController@perma_del', 'as' => 'baby_sync_servers.perma_del']);
    Route::resource('video_server_types', 'Admin\VideoServerTypesController');
    Route::post('video_server_types_mass_destroy', ['uses' => 'Admin\VideoServerTypesController@massDestroy', 'as' => 'video_server_types.mass_destroy']);
    Route::post('video_server_types_restore/{id}', ['uses' => 'Admin\VideoServerTypesController@restore', 'as' => 'video_server_types.restore']);
    Route::delete('video_server_types_perma_del/{id}', ['uses' => 'Admin\VideoServerTypesController@perma_del', 'as' => 'video_server_types.perma_del']);
    Route::resource('video_settings', 'Admin\VideoSettingsController');
    Route::post('video_settings_mass_destroy', ['uses' => 'Admin\VideoSettingsController@massDestroy', 'as' => 'video_settings.mass_destroy']);
    Route::resource('protocols', 'Admin\ProtocolsController');
    Route::post('protocols_mass_destroy', ['uses' => 'Admin\ProtocolsController@massDestroy', 'as' => 'protocols.mass_destroy']);
    Route::post('protocols_restore/{id}', ['uses' => 'Admin\ProtocolsController@restore', 'as' => 'protocols.restore']);
    Route::delete('protocols_perma_del/{id}', ['uses' => 'Admin\ProtocolsController@perma_del', 'as' => 'protocols.perma_del']);
    Route::resource('countries', 'Admin\CountriesController');
    Route::post('countries_mass_destroy', ['uses' => 'Admin\CountriesController@massDestroy', 'as' => 'countries.mass_destroy']);
    Route::post('countries_restore/{id}', ['uses' => 'Admin\CountriesController@restore', 'as' => 'countries.restore']);
    Route::delete('countries_perma_del/{id}', ['uses' => 'Admin\CountriesController@perma_del', 'as' => 'countries.perma_del']);
    Route::resource('timezones', 'Admin\TimezonesController');
    Route::post('timezones_mass_destroy', ['uses' => 'Admin\TimezonesController@massDestroy', 'as' => 'timezones.mass_destroy']);
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('channels_lists', 'Admin\ChannelsListsController');
    Route::post('channels_lists_mass_destroy', ['uses' => 'Admin\ChannelsListsController@massDestroy', 'as' => 'channels_lists.mass_destroy']);
    Route::post('channels_lists_restore/{id}', ['uses' => 'Admin\ChannelsListsController@restore', 'as' => 'channels_lists.restore']);
    Route::delete('channels_lists_perma_del/{id}', ['uses' => 'Admin\ChannelsListsController@perma_del', 'as' => 'channels_lists.perma_del']);



 
});
