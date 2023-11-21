<?php


namespace App\Traits;

trait GetReviewRatingTrait
{
    public function ratingsQuantity(): int
    {
        return $this->reviews()->count();
    }

    public function sumRating(): bool|int
    {
        $ratings = $this->reviews()->get();
        if (empty($ratings[0])) {
            return false;
        }
        $sum = 0;
        foreach ($ratings as $row) {
            $sum += $row->rating;
        }
        return $sum;
    }

    public function averageRating(): float|int
    {
        $sumRating = $this->sumRating();
        $usersQuantity = $this->ratingsQuantity();
        if ($usersQuantity === 0) {
            return false;
        }
        return $sumRating / $usersQuantity;
    }
}
