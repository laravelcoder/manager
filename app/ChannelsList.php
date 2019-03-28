<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChannelsList.
 *
 * @property   string  $channel_name
 * @property   string  $channel_type
 */
class ChannelsList extends Model
{
    use SoftDeletes;

    protected $fillable = ['channel_name', 'channel_type'];
    protected $hidden = [];

    /**
     * Relationship with the CsListChannel model.
     *
     * @return     Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cs_list_channels()
    {
        return $this->hasMany(CsListChannel::class, 'channel_id');
    }
}
