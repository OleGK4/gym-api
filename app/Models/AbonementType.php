<?php

namespace App\Models;

use App\Traits\FilteringTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonementType extends Model
{
    public $timestamps = false;
    use HasFactory, FilteringTrait;

    protected $fillable = [
        'name',
        'description',
        'price',
        'days_amount',
    ];


    public function sortByDaysAmount() {
        return $this->orderBy('days_amount')->get();
    }


// Relations
    public function abonementsOfType(): HasMany
    {
        return $this->hasMany(Abonement::class);
    }
}
