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
    
    <style>
        dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.5)
        }
    </style>
</head>
<body class="font-ubuntu transition-all text-white bg-deep-blue relative">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    
    @include('user.includes.sidebar')

    <div class="w-full p-4 sticky top-0 backdrop-blur-sm  ">
        <div class="flex gap-2">
            <div class=" rounded-md font-medium bg-light-blue shadow-2xl p-4"><a href="{{ route('userDashboard') }}">{{ env('APP_NAME') }}</a></div>
            <div class="grow p-4 rounded-md bg-light-blue shadow flex select-none">
                <span class="material-icons cursor-pointer hover:text-gray-500" id="" data-toggle="nav">keyboard_tab_rtl</span>
            </div>
        </div>
    </div>
    
    <div class="p-4">
        @yield('content')
    </div>


    <script>
        $(document).ready(function(){
            $('[data-toggle="nav"]').click(function () {
                // $('#navMenu').toggleClass('hidden')
                $('#navMenu').toggleClass('translate-x-[300px]')
            })

            $('[data-toggle="submenu"]').click(function() {
                $('#sub').toggleClass('rotate-90')
                $('#submenu').toggleClass('opacity-0')
            })
                     
        })
    </script>
</body>
</html>