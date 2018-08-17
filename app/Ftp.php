<?php

declare(strict_types=1);

namespace App;

use Hash;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ftp.
 *
 * @property string $ftp_server
 * @property string $ftp_directory
 * @property string $ftp_username
 * @property string $ftp_password
 * @property time $grab_time
 * @property string $sync_server
 */
class Ftp extends Model
{
    use SoftDeletes;

    protected $fillable = ['ftp_server', 'ftp_directory', 'ftp_username', 'ftp_password', 'grab_time', 'sync_server_id'];
    protected $hidden = ['ftp_password'];

    /**
     * Hash password.
     * @param $input
     */
    public function setFtpPasswordAttribute($input): void
    {
        if ($input) {
            $this->attributes['ftp_password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    /**
     * Set attribute to date format.
     * @param $input
     */
    public function setGrabTimeAttribute($input): void
    {
        if ($input !== null && $input !== '') {
            $this->attributes['grab_time'] = Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            $this->attributes['grab_time'] = null;
        }
    }

    /**
     * Get attribute from date format.
     * @param $input
     *
     * @return string
     */
    public function getGrabTimeAttribute($input)
    {
        if ($input !== null && $input !== '') {
            return Carbon::createFromFormat('H:i:s', $input)->format('H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty.
     * @param $input
     */
    public function setSyncServerIdAttribute($input): void
    {
        $this->attributes['sync_server_id'] = $input ? $input : null;
    }

    public function sync_server()
    {
        return $this->belongsTo(SyncServer::class, 'sync_server_id')->withTrashed();
    }
}
