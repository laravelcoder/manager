<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SyncServer.
 *
 * @property string $name
 */
class SyncServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
}
