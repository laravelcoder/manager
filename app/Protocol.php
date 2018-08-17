<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Protocol.
 *
 * @property string $protocol
 * @property string $real_name
 */
class Protocol extends Model
{
    use SoftDeletes;

    protected $fillable = ['protocol', 'real_name'];
    protected $hidden = [];
}
