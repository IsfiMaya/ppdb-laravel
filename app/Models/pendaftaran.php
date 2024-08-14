<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'role',
        'data_diri_id',
        'user_id',
        'NPSN',
        'ijazah',
        'kk',
        'akta_lahir',
        'nilai_raport',
        'prestasi1',
        'prestasi2',
        'prestasi3',
        'b_pembayaran',
    ];

    public function get_pendaftaran()
    {
        $data = pendaftaran::get();
        return $data;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countPendaftar()
    {
        return self::count();
    }
}
