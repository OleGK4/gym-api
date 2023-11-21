<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbonementType extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'days_amount',
    ];

    public function sortByName() {
        // TODO: sortByName() method
    }
    public function sortByPrice() {
        // TODO: sortByPrice() method
    }
    public function sortByDaysAmount() {
        // TODO: sortByDaysAmount() method
    }


// Relations
    public function abonementsOfType(): HasMany
    {
        return $this->hasMany(Abonement::class);
    }
}
