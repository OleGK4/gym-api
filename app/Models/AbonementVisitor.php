<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonementVisitor extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'datetime_visited',
        'user_id',
    ];

// Relations

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
