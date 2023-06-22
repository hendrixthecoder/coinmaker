@extends('admin.layouts.app')
@section('title', 'Edit Payment Methods')
@section('content')
    <div class="flex flex-col gap-4 w-full">
        @if (Session::has('success'))
            <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
        @endif
        <div class="w-full p-4 bg-light-blue rounded-md">
            Edit the payment details of the site here.
        </div>
        <form action="{{ route('putPaymentMethods') }}" method="post" class="flex bg-light-blue p-4 rounded-md shadow-lg flex-col gap-7">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-2">
                <label for="btc">BTC:</label>
                <input type="text" name="btc" id="btc" value="{{ $btc->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="eth">ETH:</label>
                <input type="text" name="eth" id="eth" value="{{ $eth->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="usdt">USDT:</label>
                <input type="text" name="usdt" id="usdt" value="{{ $usdt->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="bnb">BNB:</label>
                <input type="text" name="bnb" id="bnb" value="{{ $bnb->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="trx">TRX:</label>
                <input type="text" name="trx" id="trx" value="{{ $trx->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="matic">MATIC:</label>
                <input type="text" name="matic" id="matic" value="{{ $matic->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <div class="flex flex-col gap-2">
                <label for="solana">SOLANA:</label>
                <input type="text" name="solana" id="solana" value="{{ $solana->address }}" class="rounded-md bg-deep-blue p-3 outline-none">
            </div>
            <button class="bg-blue-500 p-3 rounded-md w-32">Submit</button>
        </form>

    </div>
@endsection