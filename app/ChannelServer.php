<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChannelServer
 *
 * @package App
 * @property string $name
 * @property string $cs_host
*/
class ChannelServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'cs_host'];
    protected $hidden = [];
    
    
    
    public function channel()
    {
        return $this->belongsToMany(ChannelsList::class, 'channel_server_channels_list')->withTrashed();
    }
    
}
