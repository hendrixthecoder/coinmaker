@extends('user.layouts.app')
@section('content')
    <div class="m-6 flex flex-col gap-4">
        <h1 class="font-bold text-4xl">Withdrawals</h1>
    </div>
    <div class="border-t border-neutral-700"></div>
    <div class="my-6">
        <button data-toggle="modal" class="bg-blue-500 px-4 py-2 flex gap-3 rounded-md text-white">
            <span class="material-icons">add</span>
            New Withdrawal
        </button>
    
        <dialog class="rounded-md bg-deep-blue text-white shadow p-4 w-9/12 max-w-lg" id="newWithdrawal">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <p class="font-bold">Make a new withdrawal</p>
                    <span class="material-icons block cursor-pointer" onclick="closeDepositModal()">close</span>
                </div>

                <form action="{{ route('newWithdrawals') }}" method="post" class="flex flex-col gap-5">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label for="amount">Amount:</label>
                        <input type="number" required name="amount" id="amount" class="rounded-md p-4 outline-none bg-light-blue">
                    </div>
                    <input type="submit" value="Submit" class="bg-blue-500 p-2 cursor-pointer text-white rounded-md">

                </form>
            </div>
        </dialog>
    </div>

    @if ($withdrawals->isEmpty())
        <p class="rounded-md p-3 shadow-lg my-7 text-white bg-light-blue">You have not made any withdrawals, click the icon above to create one.</p>
    @else

    @endif

    <div class="my-10">
        <div class="rounded-md p-4 bg-light-blue flex flex-col gap-4">
            <p class="font-medium">Balance</p>
            <p>${{ $balance }} USD</p>
            <p class="italic">- Have a great day!</p>
        </div>
    </div>

    <div class="my-10">
        <div class="rounded-md p-4 bg-light-blue flex flex-col gap-4">
            <p>Note that funds withdrawn will me made available and deducted from your Balance as soon as the transaction is approved.</p>
        </div>
    </div>

    @if (Session::has('success'))
        <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
    @endif

    @if (Session::has('error'))
        <p class="rounded-md my-4 bg-red-500 p-3 text-white">{{ Session::get('error') }}</p>
    @endif

    <script>
        let btn = document.querySelector('[data-toggle="modal"]')
        let modal = document.querySelector('#newWithdrawal')

        const closeDepositModal = () => modal.close()
        btn.addEventListener('click', () => modal.showModal())

    </script>
@endsection