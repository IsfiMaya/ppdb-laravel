<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_diri extends Model
{
    protected $table = 'data_diri';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'asal_kota',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'email',
        'no_handphone',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'total_pendapatan',
        'no_handphone_orangtua',
        'pas_photo',
    ];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'data_diri_id', 'id');
    }


    public function get_data_diri()
    {
        $data = data_diri::with(['user', 'pendaftaran'])->get();
        return $data;
    }

    public function ppdbData()
    {
        $data = data_diri::with(['user', 'pendaftaran', 'kelulusan'])->get();
        return $data;
    }


    public function lulus()
    {
        return data_diri::whereHas('kelulusan', function ($query) {
            $query->where('status', 0);
        })
            ->with([
                'kelulusan' => function ($query) {
                    $query->select('id', 'user_id', 'status');
                }
            ])
            ->get();
    }

    public function countToday()
    {
        return data_diri::whereDate('created_at', today())->count();
    }

    public function countDataDiri()
    {
        return self::count();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelulusan()
    {
        return $this->hasOne(kelulusan::class, 'user_id');
    }
}
