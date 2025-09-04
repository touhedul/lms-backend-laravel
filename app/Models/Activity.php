<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'chapter_id',
        'lesson_id',
        'is_completed',
        'is_last_watched',
    ];
}
