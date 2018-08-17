<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::resource('channel_servers', 'ChannelServersController', ['except' => ['create', 'edit']]);

    Route::resource('cs_channel_lists', 'CsChannelListsController', ['except' => ['create', 'edit']]);

    Route::resource('csis', 'CsisController', ['except' => ['create', 'edit']]);

    Route::resource('csos', 'CsosController', ['except' => ['create', 'edit']]);

    Route::resource('users', 'UsersController', ['except' => ['create', 'edit']]);

    Route::resource('sync_servers', 'SyncServersController', ['except' => ['create', 'edit']]);

    Route::resource('ftps', 'FtpsController', ['except' => ['create', 'edit']]);

    Route::resource('general_settings', 'GeneralSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('output_settings', 'OutputSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('realtime_notifications', 'RealtimeNotificationsController', ['except' => ['create', 'edit']]);

    Route::resource('per_channel_configurations', 'PerChannelConfigurationsController', ['except' => ['create', 'edit']]);

    Route::resource('report_settings', 'ReportSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('countries', 'CountriesController', ['except' => ['create', 'edit']]);

    Route::resource('timezones', 'TimezonesController', ['except' => ['create', 'edit']]);
});
