<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dayatampung extends Model
{
    use HasFactory;
    protected $table = 'daya_tampung';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'putra',
        'putri',
        'created_at',
        'updated_at'
    ];
}
