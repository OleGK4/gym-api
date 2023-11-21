<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'rating',
        'user_id',
        'employee_id',
        'role_id',
        'score',
    ];

// Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
