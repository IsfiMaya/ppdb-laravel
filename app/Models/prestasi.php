<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestasi extends Model
{
    protected $table = 'prestasi';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'nama_p',
        'deskripsi',
        'nama_m',
        'b_prestasi'
    ];

    public function get_prestasi()
    {
        $data = prestasi::get();
        return $data;
    }
}
