<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GeneralSetting.
 *
 * @property string $transcoding_server
 * @property string $sync_server
 */
class GeneralSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['transcoding_server', 'sync_server_id'];
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
}
