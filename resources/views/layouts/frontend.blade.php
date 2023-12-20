<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{ $getTheme['site_description'] }}">
        <meta name="author" content="Rama Can">
        <title>{{ $getTheme['site_name'] }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ url($getTheme['logo']) }}">

        <!-- Additional CSS Files -->
        @vite(['resources/css/frontend.css'])
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/templatemo-klassy-cafe.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        @livewireStyles
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <x-frontend.layouts.header />
    <!-- ***** Header Area End ***** -->

    <main>
        {{ $slot }}
    </main>

    <!-- ***** Footer Start ***** -->
    <x-frontend.layouts.footer />

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        flatpickr('.dateReservation', {
            dateFormat: 'd-m-Y',
            defaultDate: [new Date()],
            enableTime: false,
        });
        flatpickr('.timeReservation', {
            dateFormat: 'H:i',
            defaultDate: [new Date()],
            enableTime: true,
            time_24hr: true,
            noCalendar: true,
        });
    });
    </script>
    @livewireScripts
    </body>
</html>
