<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

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
