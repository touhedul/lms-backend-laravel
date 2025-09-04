<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    /** @use HasFactory<\Database\Factories\OutcomeFactory> */
    use HasFactory;

    protected $fillable = [
        'course_id',
        'text',
        'sort_order',
    ];
}
