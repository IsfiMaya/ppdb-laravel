<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class articles extends Model
{
    protected $table = 'article';
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'article_img_path',
        'title',
        'slug',
        'summary',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function get_article()
    {
        $data = articles::where('is_active', 1)->take(6)->get();

        return $data;
    }
}
