<div class="text-warning mr-2">
    <?php
    $total = 0;
    $totalUser = 0;
    $rating = 0;
    if(count($productReview)){
        foreach (json_decode($productReview) as $key => $review){
            $total += $review->rating;
        }
        $totalUser = $productReview->count();
        $rating = $total / $totalUser;
    }

    ?>
    {{ renderStarRating($rating) }}
</div>
@if( $text == null)
    <span class="text-secondary font-size-13">( {{ $totalUser }} )</span>
@else
    <span class="text-secondary font-size-13">( {{ $totalUser. ' '. __('customer reviews') }} )</span>
@endif

