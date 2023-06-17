@extends('admin.layouts.app')

@section('content')
<div class="m-6">
    <h1 class="font-bold text-4xl">Dashboard</h1>
</div>
<div class="border border-neutral-600"></div>
<div class="flex flex-col md:grid md:grid-cols-2 gap-5 my-6">
    <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
        <div class="flex gap-4">
            <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                <span class="material-icons text-white">account_balance</span>
            </div>
            <div class="flex flex-col">
                <p>Total Pending Deposits</p>
                <p>${{ $deposits }} USD</p>
            </div>
        </div>
    </div>
    <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
        <div class="flex gap-4">
            <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                <span class="material-icons text-white">monetization_on</span>
            </div>
            <div class="flex flex-col">
                <p>Total Pending Withdrawals</p>
                <p>${{ $withdrawals }} USD</p>
            </div>
        </div>
    </div>
    <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
        <div class="flex gap-4">
            <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                <span class="material-icons text-white">groups</span>
            </div>
            <div class="flex flex-col">
                <p>Total Users</p>
                <p>{{ $users }}</p>
            </div>
        </div>
    </div>
    <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
        <div class="flex gap-4">
            <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                <span class="material-icons text-white">account_balance</span>
            </div>
            <div class="flex flex-col">
                <p>Total Investment Plans</p>
                <p>{{ $plans }}</p>
            </div>
        </div>
    </div>
</div>
@endsection