<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Program extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'image',
    ];

// Relations

    public function reviews(): HasMany
    {
        return $this->hasMany(ProgramReview::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(ProgramEmployee::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }

    public function programVisitors(): HasManyThrough
    {
        return $this->hasManyThrough(LessonVisitor::class, Lesson::class);
    }
}
