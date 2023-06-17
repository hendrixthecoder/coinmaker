@extends('admin.layouts.app')
@section('content')
<div class="my-6">
    @if (Session::has('success'))
        <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
    @endif
    @if ($withdrawals->isEmpty())            
        <div class="rounded-md bg-light-blue shadow-lg p-4 flex flex-col gap-4">
            <h3 class="font-bold text-lg">Whoops!</h3>
            <p>There are no pending withdrawals in the system, come back later when a new deposit has been made.</p>
            <p class="italic">- Have a great day!</p>
        </div>
    @else
        <div class="m-6">
            <h1 class="font-bold text-4xl">Pending Withdrawals</h1>
        </div>
        <div class="border border-neutral-600"></div>
        <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
            <div class="overflow-auto">
                <table class="text-center w-full">
                    <thead>
                        <tr class="">
                            <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                            <th class="border border-neutral-600 p-2" scope="col">Date Made</th>
                            <th class="border border-neutral-600 p-2" scope="col">Transaction ID</th>
                            <th class="border border-neutral-600 p-2" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($withdrawals as $withdrawal) 
                            <tr class="">
                                <td class="border p-2 border-neutral-600">${{ $withdrawal->amount }}</td>
                                <td class="border p-2 border-neutral-600">{{ $withdrawal->created_at }}</td>
                                <td class="border p-2 border-neutral-600">{{ $withdrawal->transaction_id }}</td>
                                <td class="border p-2 border-neutral-600">
                                    <button class="rounded-md bg-blue-500 p-3 flex gap-1" data-toggle-modal="{{ $withdrawal->id }}">
                                        <span class="material-icons">visibility</span>
                                        View
                                    </button>
                                </td>
                            </tr>
                            <dialog class="bg-deep-blue rounded-md p-4 w-9/12 text-white" id="view{{ $withdrawal->id }}">
                                <div class="w-full flex justify-between">
                                    <p>Actions</p>
                                    <span class="material-icons cursor-pointer select-none" data-close="modal">close</span>
                                </div>
                                <div class="flex justify-between gap-4 my-4">
                                    <form action="{{ route('approveWithdrawal') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $withdrawal->id }}" hidden>
                                        <input type="submit" value="Approve" class="cursor-pointer w-full bg-green-500 p-2 rounded-md">
                                    </form>
    
                                    <form action="{{ route('declineWithdrawal') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $withdrawal->id }}" hidden>
                                        <input type="submit" value="Decline" class="cursor-pointer w-full bg-red-500 p-2 rounded-md">
                                    </form>
                                </div>
                            </dialog>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $withdrawals->links() }}
        </div>
    @endif
</div>
<script>
    const openBtn = document.querySelector('[data-toggle-modal]')
    const closeBtn = document.querySelector('[data-close="modal"]')
    
    console.log(openBtn);
    console.log(closeBtn);

    openBtn.addEventListener('click', function() {
        let id = event.target.getAttribute('data-toggle-modal')
        let modal = document.querySelector(`#view${id}`)
        return modal.showModal()
    })

    closeBtn.addEventListener('click', function() {
        return event.target.parentNode.parentNode.close()
    })

</script>
@endsection