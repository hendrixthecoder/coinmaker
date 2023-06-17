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

    <form action="" method="post" class="my-4 flex flex-col gap-10">
        <div class="sm:grid sm:grid-cols-2 sm:gap-x-9 flex flex-col gap-10">
            <div class="flex gap-2 flex-col">
                <label for="name" class="text-sm">Your name</label>
                <input class="p-3 border rounded-md" type="text" id="name" name="name" placeholder="Scott Wilson">
            </div>

            <div class="flex gap-2 flex-col">
                <label for="email" class="text-sm">Your email address</label>
                <input class="p-3 border rounded-md" type="text" id="email" name="email" placeholder="a@b.com">
            </div>

            <div class="flex gap-2 flex-col">
                <label for="subject" class="text-sm">Subject</label>
                <input class="p-3 border rounded-md" type="text" id="subject" name="subject" placeholder="Investment Plans">
            </div>

            <div class="flex gap-2 flex-col">
                <label for="number" class="text-sm">Your phone number</label>
                <input class="p-3 border rounded-md" type="text" id="name" name="name" placeholder="1-234-5678-4567">
            </div>
        </div>

        <div class="flex gap-2 flex-col">
            <label for="message" class="text-sm text-gray-600">How can we help you?</label>
            <textarea name="" id="" cols="30" rows="4" class="border p-3 rounded-md" placeholder="Hi there, I would like to ...">

            </textarea>
        </div>

        <input type="submit" value="Submit" class="bg-blue-500 px-14 py-4 rounded-md text-white mx-auto">

        <p class="text-sm text-center text-gray-500">We will get back to you in 1-2 business days.</p>
    </form>
@endsection