<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CsChannelList.
 *
 * @property string $channel_server
 * @property string $channel_name
 * @property string $channel_type
 */
class CsChannelList extends Model
{
    use SoftDeletes;

    protected $fillable = ['channel_name', 'channel_type', 'channel_server_id'];
    protected $hidden = [];

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setChannelServerIdAttribute($input): void
    {
        $this->attributes['channel_server_id'] = $input ? $input : null;
    }

    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }
}
