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
 * @property string $sync_server
 */
class AggregationServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['server_name', 'server_host', 'sync_server_id'];
    protected $hidden = [];

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

    public function baby_sync_servers()
    {
        return $this->hasMany(BabySyncServer::class, 'parent_aggregation_server_id');
    }
}
