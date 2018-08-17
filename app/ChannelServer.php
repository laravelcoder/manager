<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChannelServer.
 *
 * @property string $name
 * @property string $cs_host
 */
class ChannelServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'cs_host'];
    protected $hidden = [];

    public function cs_channel_lists()
    {
        return $this->hasMany(CsChannelList::class, 'channel_server_id');
    }
}
