<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GetReviewRatingTrait;

class Employee extends Model implements ReviewRatingInterface
{
    public $timestamps = false;
    use HasFactory, GetReviewRatingTrait;

    protected $fillable = [
        'passport_series',
        'passport_number',
        'address',
        'education',
        'image',
    ];



    public function reviews(): HasMany
    {
        return $this->hasMany(EmployeeReview::class);
    }

}
