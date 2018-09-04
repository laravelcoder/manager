<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DefaultCloudB.
 *
 * @property string $address
 * @property string $port
 * @property string $channel_server
 */
class DefaultCloudB extends Model
{
    use SoftDeletes;

    protected $fillable = ['address', 'port', 'channel_server_id'];
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