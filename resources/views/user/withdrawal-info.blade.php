@extends('user.layouts.app')
@section('content')
<div class="flex flex-col w-full gap-6 mb-10">
    <div class="m-6 mb-2">
        <h1 class="font-bold text-3xl">Update Withdrawal Info</h1>
    </div>
    <div class="border-b select-none  border-neutral-600 flex space-x-14 pl-10 transition-all duration-500">
        <h2 class="hover:border-b pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="account">Crypto</h2>
        {{-- <h2 class="hover:border-b pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="security">Security</h2> --}}
    </div>

    <section aria-describedby="account" data="pointer" class="">
        @if (Session::has('success'))
            <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('error'))
            <p class="rounded-md my-4 bg-red-500 p-3 text-white">{{ Session::get('error') }}</p>
        @endif
        @if ($errors->any())
            <ul class="flex flex-col gap-3 my-3">
                @foreach ($errors->all() as $error)
                    <li class="rounded-md bg-red-500 text-white p-3">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="w-full rounded-md p-3 bg-light-blue">
            <form action="{{ route('edit-withdrawal') }}" method="post" class="flex flex-col gap-6 p-2">
                @csrf
                <div class="md:grid md:grid-cols-2 flex flex-col gap-4">
                    <div class="flex flex-col gap-3">
                        <label for="btc">BTC Address:</label>
                        <input type="text" name="btc_address" value="{{ Auth::user()->btc_address }}" id="btc" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="eth">ETH Address:</label>
                        <input type="text" name="eth_address" value="{{ Auth::user()->eth_address }}" id="eth" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 flex flex-col gap-4">
                    <div class="flex flex-col gap-3">
                        <label for="bnb">BNB Address:</label>
                        <input type="text" name="bnb_address" value="{{ Auth::user()->bnb_address }}" id="bnb" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                    </div>
                    <div class="flex flex-col gap-3">
                        <label for="trx">TRX Address:</label>
                        <input type="text" name="trx_address" value="{{ Auth::user()->trx_address }}" id="trx" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 flex flex-col gap-4">
                    <div class="flex flex-col gap-3">
                        <label for="usdt">USDT Address:</label>
                        <input type="text" name="usdt_address" value="{{ Auth::user()->usdt_address }}" id="usdt" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                    </div>
                </div>

                <input type="submit" value="Submit" class="bg-blue-500 cursor-pointer w-20 rounded-md p-3">
            </form>
        </div>
    </section>
    {{-- <section aria-describedby="security" data="pointer" class="hidden" >
        <div class="w-full rounded-md p-3 bg-light-blue flex flex-col gap-4">
            <div class="bg-deep-blue rounded-xl w-full p-6 flex flex-col gap-4">
                <h3 class="text-xl font-medium">Worried your password has been compromised?</h3>
                <p>Change the password below?</p>
            </div>
            <form action="{{ route('changePassword') }}" method="post" class="flex flex-col gap-4">
                @csrf
                <div class="flex flex-col gap-3">
                    <label for="curr_password">Current Password:</label>
                    <input type="password" required name="curr_password" id="curr_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                </div>
                <div class="flex flex-col gap-3">
                    <label for="new_password">New Password:</label>
                    <input type="password" required name="password" id="new_password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                </div>
                <div class="flex flex-col gap-3">
                    <label for="password_confirmation">Confirm New Password:</label>
                    <input type="password" required name="password_confirmation" id="password_confirmation" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" class="rounded-md bg-deep-blue shadow-lg outline-none p-3">
                </div>
                <input type="submit" value="Submit" class="bg-blue-500 cursor-pointer w-20 rounded-md p-3">
            </form>
        </div>
    </section>  --}}
</div>

<script>
    $(document).ready(function () {
        //set the account tab bottom border color to blue
        $('[data-toggle-target="account"]').addClass('border-b border-blue-500')

        //function
        $('[data-toggle="pointer"]').click(function () {
            $('[data-toggle="pointer"]').removeClass('border-blue-500 border-b')
            $('[data="pointer"]').hide()

            let target = event.target.getAttribute('data-toggle-target')

            $(event.target).toggleClass('border-blue-500 border-b')
            $(`[aria-describedby=${target}]`).show()
        })
    })
</script>
@endsection