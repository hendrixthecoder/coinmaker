<div class="select-none">
    <nav class="flex justify-between w-full my-4 ">
        <p>Logo here</p>
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