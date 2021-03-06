<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Timezone.
 *
 * @property string $timezone
 */
class Timezone extends Model
{
    protected $fillable = ['timezone'];
    protected $hidden = [];
}
