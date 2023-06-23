<div class="select-none p-4 py-1 lg:py-10 lg:px-32 z-50 bg-white sticky top-0" data-nav="true">
    <nav class="flex py-2 justify-between items-center w-full">
        <div class="w-20 h-20">
            <img src="{{ asset('images/logo.png') }}" class="object-contain w-full h-full" alt="CriptaliaElite Logo">
        </div>
        <div class="flex justify-between gap-5 max-sm:hidden">
            <a href="{{ route('home') }}" class="@if (Route::is('home')) text-blue-500 @endif hover:text-gray-500">Home</a>
            <a href="{{ route('about') }}" class="@if (Route::is('about')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">About Us</a>
            <a href="{{ route('contact') }}" class="@if (Route::is('contact')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Contact Us</a>
            <a href="{{ route('register') }}" class="@if (Route::is('register')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Sign Up</a>
            <a href="{{ route('login') }}" class="@if (Route::is('login')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Login</a>
        </div>
        <div class="rounded-full p-2 bg-gray-200 flex sm:hidden " id="nav-toggle-btn">
            <span class="material-icons text-gray-500 cursor-pointer">menu</span>
        </div>
    </nav>
    <div class="z-50 absolute w-full left-0 bg-white shadow rounded-md flex flex-col hidden gap-4 sm:hidden p-5" id="mobile-nav">
        <a href="{{ route('home') }}" class="@if (Route::is('home')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Home</a>
        <a href="{{ route('about') }}" class="@if (Route::is('about')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">About Us</a>
        <a href="{{ route('contact') }}" class="@if (Route::is('contact')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Contact Us</a>
        <a href="{{ route('register') }}" class="@if (Route::is('register')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Sign Up</a>
        <a href="{{ route('login') }}" class="@if (Route::is('login')) text-blue-500 @endif hover:text-gray-500 transition-all duration-200">Login</a>
    </div>
</div>
