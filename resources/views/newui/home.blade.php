@extends('newui.layouts.app')

@section('meta')
    <link rel="canonical" href="{{ route('new.home') }}"/>
@endsection

@section('content')
    <main id="content" role="main">

        @include('newui.home.banner_section')

        <div class="container">
            @include('newui.home.above-recent-product-ads')

            @include('newui.home.recent-product')

            @include('newui.home.deals-of-the-day')

            @include('newui.home.deals-tabs')

            @include('newui.home.single-banner-ads')

            @include('newui.home.popular-categories-week')

            @include('newui.home.banner-2')

            @include('newui.home.home-category')

            @include('newui.home.recommendation')

{{--            @include('newui.home.classified_ads')--}}

            @include('newui.home.banner-3')

            @include('newui.home.brand-carousel')

        </div>

    </main>
@endsection

@push('script')
    <script>

        const homepage = {
            init: function () {
                this.cacheDom();
                this.initPlugins();
            },

            cacheDom: function () {
                this.$homepage = $('#homepage');
            },

            initPlugins: function () {

                // $('.js-slick-carousel-four-items').slick({
                //     infinite: true,
                //     slidesToShow: 4,
                //     slidesToScroll: 4,
                //     prevArrow: false,
                //     nextArrow: false
                // });

                @if(isset($loginPage) )
                    $('#loginForm').show();
                @endif
                $.post('{{ route('new.home.section.best_selling') }}', {_token: '{{ csrf_token() }}'}, function (data) {
                    $('#section_recommendation').html(data);
                });

                /* If Today's Offer then timer js is shown*/
                /*flash deal count Down Time*/
                var countDownDate = $("#todaysDealCounter").attr('data-countdown-date');
                var finalHours, finalDay, finalMinutes, finalSeconds = null;
                // Set the date we're counting down to
                countDownDate = new Date(countDownDate).getTime();
                // Update the count down every 1 second
                var x = setInterval(function () {
                    // Get today's date and time
                    var now = new Date().getTime();
                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;
                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    if (days < 10) {
                        finalDay = '0' + days;
                    } else {
                        finalDay = days;
                    }
                    if (hours < 10) {
                        finalHours = '0' + hours;
                    } else {
                        finalHours = hours;
                    }
                    if (minutes < 10) {
                        finalMinutes = '0' + minutes;
                    } else {
                        finalMinutes = minutes;
                    }
                    if (seconds < 10) {
                        finalSeconds = '0' + seconds;
                    } else {
                        finalSeconds = seconds;
                    }
                    // Display the result in the element with id="demo"
                    $(".timer_counter").html(`Ends in: ${finalDay} : ${finalHours} : ${finalMinutes} : ${finalSeconds}`);
                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        $('#todays_deal').remove();
                        // document.getElementById("data-countdown__date").innerHTML = "EXPIRED";
                    }
                }, 1000);
                /* end of flash deal count Down Time*/
            }
        }
        homepage.init();

    </script>
@endpush


