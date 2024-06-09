<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'icon',
        'title_en',
        'title_ar',
        'small_description_en',
        'small_description_ar',
        'description_en',
        'description_ar',
        'is_published',
    ];
}
