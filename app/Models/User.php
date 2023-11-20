<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'age',
        'gender',
        'email',
        'phone',
        'password',
        'role_id',
        'score',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function addUserScore($score, $lessonDuration) {

        // Add sum of lesson's duration as user's score
        $score += $lessonDuration;
        $this->score = $score;
        $this->save();
    }

// Relations
    // User's domains
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function abonement(): HasOne
    {
        return $this->hasOne(Abonement::class);
    }

    public function abonementPrograms(): HasManyThrough
    {
        return $this->hasManyThrough(AbonementProgram::class, Abonement::class);
    }

    // Visits
    public function abonementVisits(): HasMany
    {
        return $this->hasMany(AbonementVisitor::class);
    }

    public function lessonVisits(): HasMany
    {
        return $this->hasMany(LessonVisitor::class);
    }

    // Reviews
    public function employeeReviews(): HasMany
    {
        return $this->hasMany(EmployeeReview::class);
    }

    public function programReviews(): HasMany
    {
        return $this->hasMany(ProgramReview::class);
    }

}
