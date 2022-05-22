<?php

namespace App\Services;

use App\Interfaces\ReviewInterface;
use App\Models\Review;

class ReviewService implements ReviewInterface
{
    public function getAllReviews()
    {
        return Review::all();
    }

    public function getAReview($reviewID)
    {
      return Review::find($reviewID);
    }

    public function createReview(array $reviewDetails)
    {
      return Review::create($reviewDetails);
    }

    public function UpdateReview($reviewID, array $newreviewDetails)
    {
        return Review::whereId($reviewID)->update($newreviewDetails);
    }

    public function DeleteReview($reviewID)
    {
        return Review::destroy($reviewID);
    }

}
