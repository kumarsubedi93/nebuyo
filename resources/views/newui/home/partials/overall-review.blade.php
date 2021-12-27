@if(count($productReview))
    <?php
    $num5 = 0; $num4 = 0; $num3 = 0; $num2 = 0; $num1 = 0; $total = 0;
    $review5 = 0; $review4 = 0; $review3 = 0; $review2 = 0; $review1 = 0;
    $rating = 0;
    foreach ($productReview as $key => $review){
        if($review['rating'] ==  '5'){
            $num5 += 1;
            $review5 = $review5 + $review['rating'];
        }
        elseif($review['rating'] ==  '4'){
            $num4 += 1;
            $review4 = $review4 + $review['rating'];
        }
        elseif($review['rating'] ==  '3'){
            $num3 += 1;
            $review3 = $review3 + $review['rating'];
        }
        elseif($review['rating'] ==  '2'){
            $num2 += 1;
            $review2 = $review2 + $review['rating'];
        }
        else{
            $num1 += 1;
            $review1 = $review1 + $review['rating'];
        }
    }

    $totalUser =count($productReview);
    $total = $review5 + $review4 + $review3 + $review2 + $review1;
    $rating = round($total / $totalUser, 1) ;
    ?>
    <div class="col-md-6">
        <div class="mb-3">
            <h3 class="font-size-18 mb-6">{{ translate('Based on '. count($productReview). ' reviews') }} </h3>
            <h2 class="font-size-30 font-weight-bold text-lh-1 mb-0">{{ $rating }}/5</h2>
            <a class="row align-items-center mx-gutters-2 font-size-1" >
                <div class="col-auto mb-4 mb-md-0">
                    <div class="text-warning text-ls-n2 font-size-30" style="width: 250px;">
                        {{ renderStarRating($reviewRating=$rating) }}
                    </div>
                </div>
            </a>
            <div class="text-lh-1">{{ translate('overall') }} </div>
        </div>
    </div>
    <div class="col-md-6">
        <ul class="list-unstyled">
            <li class="py-1">
                    <a class="row align-items-center mx-gutters-2 font-size-1" >
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                {{ renderStarRating($reviewRating=5) }}
                            </div>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                <div class="progress-bar" role="progressbar"  style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <span class="text-gray-90">{{ $num5 }}</span>
                        </div>
                    </a>
                    <a class="row align-items-center mx-gutters-2 font-size-1" >
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                {{ renderStarRating($reviewRating=4) }}
                            </div>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                <div class="progress-bar" role="progressbar"  style="width: 80%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <span class="text-gray-90">{{ $num4 }}</span>
                        </div>
                    </a>
                    <a class="row align-items-center mx-gutters-2 font-size-1" >
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                {{ renderStarRating($reviewRating=3) }}
                            </div>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                <div class="progress-bar" role="progressbar"  style="width: 60%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <span class="text-gray-90">{{ $num3 }}</span>
                        </div>
                    </a>
                    <a class="row align-items-center mx-gutters-2 font-size-1" >
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                {{ renderStarRating($reviewRating=2) }}
                            </div>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                <div class="progress-bar" role="progressbar"  style="width: 40%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <span class="text-gray-90">{{ $num2 }}</span>
                        </div>
                    </a>
                    <a class="row align-items-center mx-gutters-2 font-size-1" >
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                {{ renderStarRating($reviewRating=1) }}
                            </div>
                        </div>
                        <div class="col-auto mb-2 mb-md-0">
                            <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                <div class="progress-bar" role="progressbar"  style="width: 20%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <span class="text-gray-90">{{ $num1 }}</span>
                        </div>
                    </a>
            </li>
        </ul>
        <!-- End Ratings -->
    </div>
@endif
