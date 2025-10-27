<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'level_id',
        'language_id',
        'description',
        'price',
        'cross_price',
        'status',
        'is_featured',
        'image',
    ];

    public function getImageAttribute()
    {
         return $this->attributes['image'] ? asset('storage/' . $this->attributes['image']) : null;
    }

    public function chapters()
    {
         return $this->hasMany(Chapter::class)->orderBy('sort_order');
    }

    public function outcomes()
    {
         return $this->hasMany(Outcome::class);
    }
    public function requirements()
    {
         return $this->hasMany(Requirement::class);
    }

    public function level()
    {
         return $this->belongsTo(Level::class);
    }

    public function category()
    {
         return $this->belongsTo(Category::class);
    }

    public function language()
    {
         return $this->belongsTo(Language::class);
    }

    
}
