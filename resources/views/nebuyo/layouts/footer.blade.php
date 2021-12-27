
<script>
    var offerdest = new Date("dec 29, 2021 10:00:00").getTime();
    var x = setInterval(function () {
        var now = new Date().getTime();
        var offerdue = offerdest - now;
        days = Math.floor(offerdue / (1000 * 60 * 60 * 24));
        hours = Math.floor(
            (offerdue % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        minutes = Math.floor((offerdue % (1000 * 60 * 60)) / (1000 * 60));
        seconds = Math.floor((offerdue % (1000 * 60)) / 1000);

        if (days < 10) {
            finalDay = "0" + days;
        } else {
            finalDay = days;
        }
        if (hours < 10) {
            finalHours = "0" + hours;
        } else {
            finalHours = hours;
        }
        if (minutes < 10) {
            finalMinutes = "0" + minutes;
        } else {
            finalMinutes = minutes;
        }
        if (seconds < 10) {
            finalSeconds = "0" + seconds;
        } else {
            finalSeconds = seconds;
        }
        if (offerdest > 0) {
            document.getElementById("offer-option").innerHTML = "Time remaining";
            document.getElementById("offer-countdown-day").innerHTML = finalDay;
            document.getElementById("offer-countdown-hour").innerHTML =
                finalHours;
            document.getElementById("offer-countdown-minute").innerHTML =
                finalMinutes;
            document.getElementById("offer-countdown-second").innerHTML =
                finalSeconds;
        }
        if (offerdest <= 0) {
            document.getElementById("offer-option").innerHTML =
                "Offer Coming Soon";
            document.getElementById("offer-countdown-day").innerHTML = "00";
            document.getElementById("offer-countdown-hour").innerHTML = "00";
            document.getElementById("offer-countdown-minute").innerHTML = "00";
            document.getElementById("offer-countdown-second").innerHTML = "00";
        }
    }, 1000);
</script>
<!-- custome js -->
<script src="{!! static_asset('nebuyo/js/js.js') !!}"></script>
<!-- Bootstrap Bundle with Popper -->
<script
    src="{!! static_asset('nebuyo/js/bootstrap.bundle.min.js') !!}"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
></script>
</body>
</html>
