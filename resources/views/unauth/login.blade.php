@extends('unauth.layouts.app')
@section('title', 'Login')
@section('content')
    <div class="flex flex-col gap-3 mt-6 p-4 mx-auto max-w-2xl">
        <h2 class="text-2xl font-medium">Welcome back</h2>
        <p class="text-gray-500">Login to manage your account.</p>
    </div>
    @if ($errors->any())
        <ul class="flex flex-col gap-3 mx-auto max-w-2xl">
            @foreach ($errors->all() as $error)
                <li class="rounded-md bg-red-500 text-white p-3">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="mt-6 p-4">
        <form action="{{ route('loginUser') }}" method="post" class="max-w-2xl mx-auto flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-3">
                <label for="email" class="text-sm ">Email</label>
                <input type="text" name="email" required id="email" value="{{ old('email') }}" class="p-3 border rounded-md" placeholder="Email Address">
            </div>

            <div class="flex flex-col gap-3">
                <label for="password" class="text-sm ">Password</label>
                <input type="password" name="password" required id="password" class="p-3 border rounded-md" placeholder="Password">
            </div>

            <div class="flex gap-3">
                <input type="checkbox" name="remember" id="remember">
                <p class="text-sm text-gray-500">Remember me?</p>
            </div>

            <p class="text-sm text-gray-500 ">Don't have an account? <a class="font-medium text-blue-500" href="{{ route('register') }}">Sign Up</a></p>

            <input type="submit" value="Sign In" class="rounded-md py-3 bg-green-600 w-24 font-medium text-white">
        </form>
    </div>
@endsection