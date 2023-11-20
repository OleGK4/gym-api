<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'duration',
        'employee_id',
        'program_id',
        'status',
        'rating',
    ];

    public function lessonUsersQuantity()
    {
        return $this->visitors()->count();
    }

    public function sumRating(): bool|int
    {
        $ratings = $this->visitors()->get();
        if (empty($ratings[0])) {
            return false;
        }
        $sum = 0;
        foreach ($ratings as $row) {
            $sum += $row->rating;
        }
        return $sum;
    }

    public function averageLessonRating($sumRating, $usersQuantity): float|int
    {
        $avg = $sumRating / $usersQuantity;
        return $avg;
    }


// Relations

    private function visitors(): HasMany
    {
        return $this->hasMany(LessonVisitor::class);
    }

    private function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    private function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
