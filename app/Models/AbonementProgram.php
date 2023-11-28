<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonementProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'abonement_id',
        'program_id',
    ];

// Relations
    public function abonement(): BelongsTo
    {
        return $this->belongsTo(Abonement::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
}
