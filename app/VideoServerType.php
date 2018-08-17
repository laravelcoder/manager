<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VideoServerType.
 *
 * @property string $server_type
 */
class VideoServerType extends Model
{
    use SoftDeletes;

    protected $fillable = ['server_type'];
    protected $hidden = [];
}
