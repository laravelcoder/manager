<?php

declare(strict_types=1);
Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function (): void {
    Route::resource('cs_channel_lists', 'CsChannelListsController', ['except' => ['create', 'edit']]);

    Route::resource('channel_servers', 'ChannelServersController', ['except' => ['create', 'edit']]);

    Route::resource('csis', 'CsisController', ['except' => ['create', 'edit']]);

    Route::resource('csos', 'CsosController', ['except' => ['create', 'edit']]);

    Route::resource('sync_servers', 'SyncServersController', ['except' => ['create', 'edit']]);

    Route::resource('ftps', 'FtpsController', ['except' => ['create', 'edit']]);

    Route::resource('general_settings', 'GeneralSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('output_settings', 'OutputSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('realtime_notifications', 'RealtimeNotificationsController', ['except' => ['create', 'edit']]);

    Route::resource('report_settings', 'ReportSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('aggregation_servers', 'AggregationServersController', ['except' => ['create', 'edit']]);

    Route::resource('video_server_types', 'VideoServerTypesController', ['except' => ['create', 'edit']]);

    Route::resource('video_settings', 'VideoSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('countries', 'CountriesController', ['except' => ['create', 'edit']]);

    Route::resource('timezones', 'TimezonesController', ['except' => ['create', 'edit']]);

    Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);
});
