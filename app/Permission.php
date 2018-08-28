<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission.
 *
 * @property string $title
 */
class Permission extends Model
{
    protected $fillable = ['title'];
    protected $hidden = [];
}
