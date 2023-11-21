<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\GetReviewRatingTrait;

class Lesson extends Model
{
    use HasFactory, GetReviewRatingTrait;
    protected $fillable = [
        'name',
        'description',
        'duration',
        'employee_id',
        'program_id',
        'status',
        'rating',
    ];


// Relations

    public function visitors(): HasMany
    {
        return $this->hasMany(LessonVisitor::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(LessonReview::class);
    }
}
