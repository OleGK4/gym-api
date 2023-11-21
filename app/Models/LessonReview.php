<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'rating',
        'lesson_visitor_id',
        'employee_id',
        'lesson_id',
    ];


// Relations

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(LessonVisitor::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, LessonVisitor::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
