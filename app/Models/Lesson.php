<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'chapter_id',
        'is_free_preview',
        'duration',
        'video',
        'description',
        'sort_order',
        'status',
    ];

    public function getVideoAttribute()
    {
         return $this->attributes['video'] ? asset('storage/' . $this->attributes['video']) : null;
    }
}
