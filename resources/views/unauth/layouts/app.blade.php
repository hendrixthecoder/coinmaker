<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="font-ubuntu transition-all duration-500">
    <div class="loader" data-preloader>
        <div class="justify-content-center jimu-primary-loading"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    @include('unauth.layouts.header')
    <div class="p-4 w-full lg:py-10 lg:px-32 relative">
        @yield('content')

    </div>
    @include('unauth.layouts.footer')
    <script>

        $(window).on('load', function () {
            $('[data-preloader]').fadeOut();
        })

        $(document).ready(function () {
            $('#nav-toggle-btn').click(() => $('#mobile-nav').toggleClass('hidden'))
            
            const handleScroll = () => {
                
                let navTop = $('[data-nav="true"]').offset().top;

                if(navTop > 1) {
                    $('[data-nav="true"]').addClass('shadow-lg')
                }

                if(navTop < 1) {
                    $('[data-nav="true"]').removeClass('shadow-lg')
    
                }
            }

            $(window).scroll(handleScroll)
        });
    </script>
</body>
</html>



