<?php

declare(strict_types=1);

/*
 * updated code from styleci
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country.
 *
 * @property string $shortcode
 * @property string $title
 */
class Country extends Model
{
    use SoftDeletes;

    protected $fillable = ['shortcode', 'title'];
    protected $hidden = [];
}
