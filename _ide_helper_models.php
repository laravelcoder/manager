<?php

declare(strict_types=1);
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App{
    /**
     * Class ChannelServer.
     *
     * @property string $name
     * @property string $cs_host
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\CsChannelList[] $cs_channel_lists
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\ChannelServer onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ChannelServer whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ChannelServer whereCsHost($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ChannelServer whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ChannelServer whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ChannelServer whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ChannelServer whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\ChannelServer withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\ChannelServer withoutTrashed()
     */
    class ChannelServer extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Country.
     *
     * @property string $shortcode
     * @property string $title
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\Country onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereShortcode($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Country withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Country withoutTrashed()
     */
    class Country extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class CsChannelList.
     *
     * @property string $channel_server
     * @property string $channel_name
     * @property string $channel_type
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $channel_server_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\CsChannelList onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereChannelName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereChannelServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereChannelType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\CsChannelList whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\CsChannelList withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\CsChannelList withoutTrashed()
     */
    class CsChannelList extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Csi.
     *
     * @property string $channel_server
     * @property string $channel
     * @property string $protocol
     * @property string $ssm
     * @property string $imc
     * @property string $ip
     * @property string $pid
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $channel_server_id
     * @property int|null $channel_id
     * @property int|null $protocol_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\Csi onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereChannelId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereChannelServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereImc($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereIp($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi wherePid($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereProtocolId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereSsm($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Csi whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Csi withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Csi withoutTrashed()
     */
    class Csi extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Cso.
     *
     * @property string $channel_server
     * @property string $channel
     * @property string $ocloud_a
     * @property int $ocp_a
     * @property string $ocloud_b
     * @property string $ocp_b
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $channel_server_id
     * @property int|null $channel_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\Cso onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereChannelId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereChannelServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereOcloudA($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereOcloudB($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereOcpA($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereOcpB($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cso whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Cso withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Cso withoutTrashed()
     */
    class Cso extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Filter.
     *
     * @property string $name
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\Filter onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Filter whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Filter whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Filter whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Filter whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Filter whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Filter withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Filter withoutTrashed()
     */
    class Filter extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Ftp.
     *
     * @property string $ftp_server
     * @property string $ftp_directory
     * @property string $ftp_username
     * @property string $ftp_password
     * @property time $grab_time
     * @property string $sync_server
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $sync_server_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\Ftp onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereFtpDirectory($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereFtpPassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereFtpServer($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereFtpUsername($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereGrabTime($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereSyncServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Ftp whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Ftp withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Ftp withoutTrashed()
     */
    class Ftp extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class GeneralSetting.
     *
     * @property string $transcoding_server
     * @property string $sync_server
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $sync_server_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\GeneralSetting onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralSetting whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralSetting whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralSetting whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralSetting whereSyncServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralSetting whereTranscodingServer($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\GeneralSetting whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\GeneralSetting withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\GeneralSetting withoutTrashed()
     */
    class GeneralSetting extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class OutputSetting.
     *
     * @property time $report_time
     * @property string $email
     * @property string $sync_server
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $email_id
     * @property int|null $sync_server_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\OutputSetting onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereEmailId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereReportTime($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereSyncServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\OutputSetting whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\OutputSetting withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\OutputSetting withoutTrashed()
     */
    class OutputSetting extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class PerChannelConfiguration.
     *
     * @property string $cid
     * @property tinyInteger $active
     * @property string $notify_channel_id
     * @property string $offset
     * @property int $ad_lengths
     * @property string $ad_spacing
     * @property string $rtn
     * @property string $sync_server
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $rtn_id
     * @property int|null $sync_server_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\PerChannelConfiguration onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereActive($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereAdLengths($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereAdSpacing($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereCid($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereNotifyChannelId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereOffset($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereRtnId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereSyncServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\PerChannelConfiguration whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\PerChannelConfiguration withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\PerChannelConfiguration withoutTrashed()
     */
    class PerChannelConfiguration extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Permission.
     *
     * @property string $title
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
     */
    class Permission extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Protocol.
     *
     * @property string $protocol
     * @property string $real_name
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\Protocol onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Protocol whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Protocol whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Protocol whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Protocol whereProtocol($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Protocol whereRealName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Protocol whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\Protocol withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\Protocol withoutTrashed()
     */
    class Protocol extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class RealtimeNotification.
     *
     * @property enum $server_type
     * @property string $r_urltn
     * @property string $sync_server
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $sync_server_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\RealtimeNotification onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereRUrltn($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereServerType($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereSyncServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\RealtimeNotification whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\RealtimeNotification withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\RealtimeNotification withoutTrashed()
     */
    class RealtimeNotification extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class ReportSetting.
     *
     * @property tinyInteger $millisecond_precision
     * @property tinyInteger $show_channel_button
     * @property tinyInteger $show_clip_button
     * @property tinyInteger $show_group_button
     * @property tinyInteger $show_live_button
     * @property tinyInteger $enable_evt
     * @property tinyInteger $enable_excel
     * @property tinyInteger $enable_evt_timing
     * @property string $timezone
     * @property string $country
     * @property string $synce_server
     * @property string $filters
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @property int|null $country_id
     * @property int|null $synce_server_id
     * @property int|null $filters_id
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\ReportSetting onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereCountryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereEnableEvt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereEnableEvtTiming($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereEnableExcel($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereFiltersId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereMillisecondPrecision($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereShowChannelButton($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereShowClipButton($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereShowGroupButton($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereShowLiveButton($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereSynceServerId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereTimezone($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\ReportSetting whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\ReportSetting withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\ReportSetting withoutTrashed()
     */
    class ReportSetting extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class Role.
     *
     * @property string $title
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Permission[] $permission
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereTitle($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
     */
    class Role extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class SyncServer.
     *
     * @property string $name
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property string|null $deleted_at
     * @method static bool|null forceDelete()
     * @method static \Illuminate\Database\Query\Builder|\App\SyncServer onlyTrashed()
     * @method static bool|null restore()
     * @method static \Illuminate\Database\Eloquent\Builder|\App\SyncServer whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\SyncServer whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\SyncServer whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\SyncServer whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\SyncServer whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\SyncServer withTrashed()
     * @method static \Illuminate\Database\Query\Builder|\App\SyncServer withoutTrashed()
     */
    class SyncServer extends \Eloquent
    {
    }
}

namespace App{
    /**
     * Class User.
     *
     * @property string $name
     * @property string $email
     * @property string $password
     * @property string $remember_token
     * @property int $id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $role
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}
