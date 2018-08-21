<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoSetting
 *
 * @package App
 * @property string $server_url
 * @property string $server_redirect
 * @property integer $hls
 * @property string $sync_server
*/
class VideoSetting extends Model
{
    protected $fillable = ['server_url', 'server_redirect', 'hls', 'sync_server_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setHlsAttribute($input)
    {
        $this->attributes['hls'] = $input ? $input : null;
    }

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
