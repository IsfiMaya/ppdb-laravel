<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'users';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'username',
        'password',
        'email',
        'asal_sekolah',
        'verifikasi',
        'role'
    ];

    public function get_admin()
    {
        $data = User::where('role', 'admin')->get();
        return $data;
    }

    public function data_diri()
    {
        return $this->hasOne(data_diri::class);
    }
    public function pendaftaran()
    {
        return $this->hasOne(pendaftaran::class);
    }
}
