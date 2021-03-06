<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CsListChannel.
 *
 * @property string $channel
 * @property string $channelserver
 * @property string $sync_server
 */
class CsListChannel extends Model
{
    use SoftDeletes;

    protected $fillable = ['channel_id', 'channelserver_id', 'sync_server_id'];
    protected $hidden = [];

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setChannelIdAttribute($input): void
    {
        $this->attributes['channel_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setChannelserverIdAttribute($input): void
    {
        $this->attributes['channelserver_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setSyncServerIdAttribute($input): void
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }

    public function channel()
    {
        return $this->belongsTo(ChannelsList::class, 'channel_id')->withTrashed();
    }

    public function channelserver()
    {
        return $this->belongsTo(ChannelServer::class, 'channelserver_id')->withTrashed();
    }

    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
}
