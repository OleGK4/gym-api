<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonVisitor extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'rating',
        'datetime_visited',
        'lesson_id',
        'user_id',
    ];

// Relations
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
