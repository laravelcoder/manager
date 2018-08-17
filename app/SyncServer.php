<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SyncServer.
 *
 * @property string $name
 * @property string $ss_host
 */
class SyncServer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'ss_host'];
    protected $hidden = [];
}
