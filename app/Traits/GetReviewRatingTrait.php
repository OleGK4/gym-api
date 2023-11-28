<?php


namespace App\Traits;


trait GetReviewRatingTrait
{
    use CheckQueryTrait;
    public function averageRating(): int | float
    {
        $rating = $this->reviews()->avg('rating');
        return $this->queryNotEmpty($rating);
    }
}
