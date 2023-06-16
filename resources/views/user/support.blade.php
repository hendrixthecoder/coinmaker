@extends('user.layouts.app')
@section('content')
    <div class="m-6">
        <h1 class="font-bold text-4xl">Support</h1>
    </div>
    <div class="border-b border-neutral-600"></div>
    <div class="my-6 flex flex-col">
        <p>For inquiries, suggestions or complaints, mail us at {{ env('MAIL_FROM_ADDRESS') }}.</p>
    </div>
@endsection