<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Timezone
 *
 * @package App
 * @property string $timezone
*/
class Timezone extends Model
{
    protected $fillable = ['timezone'];
    protected $hidden = [];
    
    
    
}
