<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoSetting.
 *
 * @property string $server_url
 * @property string $server_redirect
 * @property int $hls
 * @property string $sync_server
 */
class VideoSetting extends Model
{
    protected $fillable = ['server_url', 'server_redirect', 'hls', 'sync_server_id'];
    protected $hidden = [];

    /**
     * Set attribute to money format.
     * @param $input
     */
    public function setHlsAttribute($input): void
    {
        $this->attributes['hls'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setSyncServerIdAttribute($input): void
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }

    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
}
