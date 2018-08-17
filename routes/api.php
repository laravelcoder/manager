<?php

declare(strict_types=1);
Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function (): void {
    Route::resource('channel_servers', 'ChannelServersController', ['except' => ['create', 'edit']]);

    Route::resource('cs_channel_lists', 'CsChannelListsController', ['except' => ['create', 'edit']]);

    Route::resource('csis', 'CsisController', ['except' => ['create', 'edit']]);

    Route::resource('per_channel_configurations', 'PerChannelConfigurationsController', ['except' => ['create', 'edit']]);

    Route::resource('report_settings', 'ReportSettingsController', ['except' => ['create', 'edit']]);

    Route::resource('countries', 'CountriesController', ['except' => ['create', 'edit']]);
});
