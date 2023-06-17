@extends('unauth.layouts.app')
@section('title', 'Register')
@section('content')
    <div class="flex flex-col gap-3 my-6 p-4 mx-auto max-w-2xl">
        <h2 class="text-2xl font-medium">Sign Up</h2>
        <p class="text-gray-500">The Better way to invest. The World's Leading Investing Platform.</p>
    </div>
    <div class="my-6 p-4">
        @if ($errors->any())
            <ul class="flex flex-col gap-4 mb-5 mx-auto max-w-2xl">
                @foreach ($errors->all() as $error)
                    <li class="bg-red-500 text-white p-3 rounded-md">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form action="{{ route('registerUser') }}" method="post" class="max-w-2xl mx-auto flex flex-col gap-4">
            @csrf
            <div class=" flex max-sm:flex-col gap-5 lg:justify-between ">
                <input type="text" name="first_name" value="{{ old('first_name') }}" required class="p-3 border w-full rounded-md" placeholder="First Name">
    
                <input type="text" name="last_name" value="{{ old('last_name') }}" required class="p-3 w-full border rounded-md" placeholder="Last Name">
            </div>

            <div class="flex flex-col gap-3">
                <label for="number" class="text-sm ">Phone</label>
                <input type="text" name="number" value="{{ old('number') }}" required id="number" class="p-3 border rounded-md" placeholder="Phone">
            </div>

            <div class="flex flex-col gap-3">
                <label for="country" class="text-sm ">Country</label>

                <select name="country" required id="country" class="p-3 rounded-md border">
                    <option value="">Select country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country }}">{{ $country }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="flex flex-col gap-3">
                <label for="email" class="text-sm ">Email</label>
                <input type="text" required name="email" value="{{ old('email') }}" id="email" class="p-3 border rounded-md" placeholder="Email Address">
            </div>

            <div class="flex flex-col gap-3">
                <label for="password" class="text-sm ">Password</label>
                <input type="password" required name="password" id="password" class="p-3 border rounded-md">
            </div>

            <div class="flex gap-3">
                <input type="checkbox" name="terms" id="terms" required>
                <p class="text-sm text-gray-500">I agree to the terms and conditions</p>
            </div>

            <p class="text-sm text-gray-500 ">Got an account? <a class="font-medium text-blue-500" href="{{ route('login') }}">Login</a></p>

            <input type="submit" value="Get Started" class="rounded-md py-3 bg-blue-500 font-medium text-white">
        </form>
    </div>
@endsection