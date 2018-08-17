<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BabySyncServer
 *
 * @package App
 * @property string $baby_sync_server
 * @property string $parent_aggregation_server
*/
class BabySyncServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['baby_sync_server', 'parent_aggregation_server_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setParentAggregationServerIdAttribute($input)
    {
        $this->attributes['parent_aggregation_server_id'] = $input ? $input : null;
    }
    
    public function parent_aggregation_server()
    {
        return $this->belongsTo(AggregationServer::class, 'parent_aggregation_server_id')->withTrashed();
    }
    
}
