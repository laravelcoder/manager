<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cso.
 *
 * @property string $channel_server
 * @property string $channel
 * @property string $ocloud_a
 * @property int $ocp_a
 * @property string $ocloud_b
 * @property string $ocp_b
 */
class Cso extends Model
{
    use SoftDeletes;

    protected $fillable = ['ocloud_a', 'ocp_a', 'ocloud_b', 'ocp_b', 'channel_server_id', 'channel_id'];
    protected $hidden = [];

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setChannelServerIdAttribute($input): void
    {
        $this->attributes['channel_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setChannelIdAttribute($input): void
    {
        $this->attributes['channel_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format.
     * @param $input
     */
    public function setOcpAAttribute($input): void
    {
        $this->attributes['ocp_a'] = $input ? $input : null;
    }

    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }

    public function channel()
    {
        return $this->belongsTo(CsChannelList::class, 'channel_id')->withTrashed();
    }
}
