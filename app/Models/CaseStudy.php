<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'date',
        'description_en',
        'description_ar',
        'small_description_en',
        'small_description_ar',
        'is_published',
    ];

    public function CaseCategory()
    {
        return $this->belongsToMany(CaseCategory::class);
    }
}
