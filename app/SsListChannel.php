<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SsListChannel
 *
 * @package App
 * @property string $sync_server
 * @property string $channel
 * @property string $channel_server
*/
class SsListChannel extends Model
{
    use SoftDeletes;

    protected $fillable = ['sync_server_id', 'channel_id', 'channel_server_id'];
    protected $hidden = [];
    
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSyncServerIdAttribute($input)
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setChannelIdAttribute($input)
    {
        $this->attributes['channel_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setChannelServerIdAttribute($input)
    {
        $this->attributes['channel_server_id'] = $input ? $input : null;
    }
    
    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
    
    public function channel()
    {
        return $this->belongsTo(ChannelsList::class, 'channel_id')->withTrashed();
    }
    
    public function channel_server()
    {
        return $this->belongsTo(ChannelServer::class, 'channel_server_id')->withTrashed();
    }
    
}
