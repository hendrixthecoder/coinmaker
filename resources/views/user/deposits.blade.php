@extends('user.layouts.app')

@section('content')
    <div class="m-6">
        <h1 class="font-bold text-4xl">Deposits</h1>
    </div>
    <div class="border-b border-neutral-700"></div>
    <div class="my-6">
        <button data-toggle="modal" class="bg-blue-500 px-4 py-2 flex gap-3 rounded-md text-white">
            <span class="material-icons">add</span>
            New Deposit
        </button>
    
        <dialog class="rounded-md bg-deep-blue text-white shadow p-4 w-9/12 max-w-lg" id="newDeposit">
            <div class="flex flex-col gap-4">
                <div class="flex justify-between">
                    <p class="font-bold">Make a new deposit</p>
                    <span class="material-icons block cursor-pointer" onclick="closeDepositModal()">close</span>
                </div>

                <form action="{{ route('sendAmount') }}" method="post" class="flex flex-col gap-5">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label for="amount">Amount:</label>
                        <input type="text" name="amount" id="amount" class="rounded-md p-4 outline-none bg-light-blue">
                    </div>
                    <input type="submit" value="Submit" class="bg-blue-500 p-2 cursor-pointer text-white rounded-md">

                </form>
            </div>
        </dialog>
    </div>
    <div class="my-6">
        @if ($deposits->isEmpty())            
            <div class="rounded-md shadow-lg bg-light-blue p-4 flex flex-col gap-4">
                <h3 class="font-bold text-lg">Whoops!</h3>
                <p>Looks like you haven't made any deposits, not to worry! To do so just click the New Deposit icon up there!</p>
                <p class="italic">- Have a great day!</p>
            </div>
        @else
            @if (Session::has('success'))
                <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
            @endif
            <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
                <div class="overflow-auto w-full">
                    <table class="text-center w-full">
                        <thead>
                            <tr class="">
                                <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                                <th class="border border-neutral-600 p-2" scope="col">Status</th>
                                <th class="border border-neutral-600 p-2" scope="col">Date Made</th>
                                <th class="border border-neutral-600 p-2" scope="col">Transaction ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deposits as $deposit) 
                                <tr class="">
                                    <td class="border p-2 border-neutral-600">${{ $deposit->amount }}</td>
                                    <td class="border p-2 border-neutral-600">{{ $deposit->status }}</td>
                                    <td class="border p-2 border-neutral-600">{{ $deposit->created_at }}</td>
                                    <td class="border p-2 border-neutral-600">{{ $deposit->transaction_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $deposits->links() }}
            </div>
        @endif
    </div>
    <div class="my-10">
        <div class="rounded-md p-4 bg-light-blue shadow-lg flex flex-col gap-4">
            <p class="font-medium">Balance</p>
            <p>${{ $balance }} USD</p>
            <p class="italic">- Have a great day!</p>
        </div>
    </div>

    <div class="my-10">
        <div class="rounded-md p-4 shadow-lg bg-light-blue flex flex-col gap-4">
            <p>Note funds deposited that have not been processed will not be in your 'Balance' until it has been confirmed/approved.</p>
        </div>
    </div>

    <script>
        let btn = document.querySelector('[data-toggle="modal"]')
        let modal = document.querySelector('#newDeposit')

        const closeDepositModal = () => modal.close()
        btn.addEventListener('click', () => modal.showModal())

    </script>
@endsection