<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoSetting.
 *
 * @property string $server_url
 * @property string $server_redirect
 * @property int $hls
 */
class VideoSetting extends Model
{
    protected $fillable = ['server_url', 'server_redirect', 'hls'];
    protected $hidden = [];

    /**
     * Set attribute to money format.
     * @param $input
     */
    public function setHlsAttribute($input): void
    {
        $this->attributes['hls'] = $input ? $input : null;
    }
}
