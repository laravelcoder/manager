<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AggregationServer.
 *
 * @property string $server_name
 * @property string $server_host
 */
class AggregationServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['server_name', 'server_host'];
    protected $hidden = [];

    public function baby_sync_servers()
    {
        return $this->hasMany(BabySyncServer::class, 'parent_aggregation_server_id');
    }
}
