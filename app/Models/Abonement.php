<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonement extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'user_id',
        'abonement_type_id',
    ];

    public function remainedDays() {
        // TODO: remainedDays() method
    }

// Relations
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function abonementType(): BelongsTo
    {
        return $this->belongsTo(AbonementType::class);
    }
}
