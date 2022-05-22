<?php
namespace App\Interfaces;

interface ReviewInterface
{

    public function getAllReviews();
    public function getAReview($reviewID);
    public function createReview(array $reviewDetails);
    public function DeleteReview($reviewID);
    public function UpdateReview($reviewID, array $reviewDetails);
}
