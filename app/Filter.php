<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Filter.
 *
 * @property string $name
 */
class Filter extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = [];
}
