<?php

declare(strict_types=1);

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

    public function default_cloud_as()
    {
        return $this->hasOne(\App\DefaultCloudA::class, 'channel_server_id');
    }

    public function default_cloud_bs()
    {
        return $this->hasOne(\App\DefaultCloudB::class, 'channel_server_id');
    }

    public function local_outputs()
    {
        return $this->hasOne(\App\LocalOutput::class, 'channel_server_id');
    }
}
