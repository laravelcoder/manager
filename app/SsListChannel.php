<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SsListChannel.
 *
 * @property string $sync_server
 * @property string $channel
 */
class SsListChannel extends Model
{
    use SoftDeletes;

    protected $fillable = ['sync_server_id', 'channel_id'];
    protected $hidden = [];

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setSyncServerIdAttribute($input): void
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setChannelIdAttribute($input): void
    {
        $this->attributes['channel_id'] = $input ? $input : null;
    }

    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }

    public function channel()
    {
        return $this->belongsTo(ChannelsList::class, 'channel_id')->withTrashed();
    }
}
