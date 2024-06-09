<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_en',
        'title_ar',
        'content_en',
        'content_ar',
        'image',
        'is_published',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
