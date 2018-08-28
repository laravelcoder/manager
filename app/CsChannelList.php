<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CsChannelList
 *
 * @package App
 * @property string $channel_name
 * @property string $channel_type
 * @property string $channel_server
 * @property string $sync_server
*/
class CsChannelList extends Model
{
    use SoftDeletes;

    protected $fillable = ['channel_name', 'channel_type', 'channel_server_id', 'sync_server_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setChannelServerIdAttribute($input)
    {
        $this->attributes['channel_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSyncServerIdAttribute($input)
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }
    
    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }
    
    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
    
}
