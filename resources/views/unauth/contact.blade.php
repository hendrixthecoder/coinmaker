@extends('unauth.layouts.app')
@section('title', 'Contact Us')
@section('content')
    <div class="flex flex-col gap-4 my-6 text-center">
        <h2 class="font-medium text-3xl ">Contact Us</h2>
        <p class="text-gray-500">We love to talk about how we can help you.</p>
    </div>

    <div class="mt-32 flex text-center flex-col gap-4">
        <h2 class="font-medium text-3xl">Tell us about yourself</h2>
        <p class="text-gray-500">Whether you have questions or you would like to say hello, contact us.</p>
    </div>

    @if ($errors->any())
        <ul class="flex my-10 flex-col gap-3">
            @foreach ($errors->all() as $error)
                <li class="p-2 bg-red-500 text-white rounded-md">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if (Session::has('success'))
        <div class="my-10 text-white rounded-md bg-green-500 p-2">{{ Session::get('success') }}</div>
    @endif

    <form action="{{ route('sendmessage') }}" method="post" class="my-4 flex flex-col gap-10" >
        @csrf
        <div class="sm:grid sm:grid-cols-2 sm:gap-x-9 flex flex-col gap-10">
            <div class="flex gap-2 flex-col">
                <label for="name" class="text-sm">Your name</label>
                <input class="p-3 border rounded-md" required type="text" value="{{ old('name') }}" id="name" name="name" placeholder="Scott Wilson">
            </div>

            <div class="flex gap-2 flex-col">
                <label for="email" class="text-sm">Your email address</label>
                <input class="p-3 border rounded-md" required type="text" id="email" value="{{ old('email') }}" name="email" placeholder="a@b.com">
            </div>

            <div class="flex gap-2 flex-col">
                <label for="subject" class="text-sm">Subject</label>
                <input class="p-3 border rounded-md" required type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Investment Plans">
            </div>

            <div class="flex gap-2 flex-col">
                <label for="number" class="text-sm">Your phone number</label>
                <input class="p-3 border rounded-md" required type="text" id="number" name="number" value="{{ old('number') }}" placeholder="1-234-5678-4567">
            </div>
        </div>

        <div class="flex gap-2 flex-col">
            <label for="message" class="text-sm text-gray-600">How can we help you?</label>
            <textarea name="message" id="mesage" cols="30" rows="4" class="border p-3 rounded-md"  required placeholder="Hi there, I would like to ...">
                {{ old('message') }}
            </textarea>
        </div>

        <input type="submit" data-submit value="Submit" class="cursor-pointer bg-blue-500 px-14 py-4 rounded-md text-white mx-auto">

        <p class="text-sm text-center text-gray-500">We will get back to you in 1-2 business days.</p>
    </form>

@endsection
