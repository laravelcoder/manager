<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filter
 *
 * @package App
 * @property string $name
 * @property string $sync_server
*/
class Filter extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sync_server_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSyncServerIdAttribute($input)
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }
    
    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
    
}
