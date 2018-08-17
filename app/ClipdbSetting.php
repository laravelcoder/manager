<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClipdbSetting.
 *
 * @property string $clip_db_url
 */
class ClipdbSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['clip_db_url'];
    protected $hidden = [];
}
