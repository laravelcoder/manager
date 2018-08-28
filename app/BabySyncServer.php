<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BabySyncServer.
 *
 * @property string $baby_sync_server
 * @property string $parent_aggregation_server
 * @property string $sync_server
 */
class BabySyncServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['baby_sync_server', 'parent_aggregation_server_id', 'sync_server_id'];
    protected $hidden = [];

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setParentAggregationServerIdAttribute($input): void
    {
        $this->attributes['parent_aggregation_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setSyncServerIdAttribute($input): void
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }

    public function parent_aggregation_server()
    {
        return $this->belongsTo(AggregationServer::class, 'parent_aggregation_server_id')->withTrashed();
    }

    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
}
