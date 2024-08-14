<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelulusan extends Model
{
    use HasFactory;

    protected $table = 'kelulusan';
    protected $fillable = ['user_id', 'status','nilai'];

    public function dataDiri()
    {
        return $this->belongsTo(data_diri::class);
    }
}
