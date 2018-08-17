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
*/
class VideoSetting extends Model
{
    protected $fillable = ['server_url', 'server_redirect', 'hls'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setHlsAttribute($input)
    {
        $this->attributes['hls'] = $input ? $input : null;
    }
    
}
