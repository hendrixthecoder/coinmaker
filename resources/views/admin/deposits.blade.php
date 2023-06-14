@extends('admin.layouts.app')
@section('content')
<div class="my-6">
    @if (Session::has('success'))
        <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
    @endif
    @if ($deposits->isEmpty())            
        <div class="rounded-md border p-4 flex flex-col gap-4">
            <h3 class="font-bold text-lg">Whoops!</h3>
            <p>There are no pending deposits in the system, come back later when a new deposit has been made.</p>
            <p class="italic">- Have a great day!</p>
        </div>
    @else
        <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
            <div class="overflow-auto">
                <table class="text-center w-full">
                    <thead>
                        <tr class="">
                            <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                            <th class="border border-neutral-600 p-2" scope="col">Date Made</th>
                            <th class="border border-neutral-600 p-2" scope="col">Actions</th>
                            <th class="border border-neutral-600 p-2" scope="col">Transaction ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposits as $deposit) 
                            <tr class="">
                                <td class="border p-2 border-neutral-600">${{ $deposit->amount }}</td>
                                <td class="border p-2 border-neutral-600">{{ $deposit->created_at }}</td>
                                <td class="border p-2 border-neutral-600">
                                    <button class="rounded-md bg-blue-500 p-3 flex gap-1" onclick="openModal()" data-toggle-modal="{{ $deposit->id }}">
                                        <span class="material-icons">visibility</span>
                                        View
                                    </button>
                                </td>
                                <td class="border p-2 border-neutral-600">{{ $deposit->transaction_id }}</td>
                            </tr>
                            <dialog class="bg-deep-blue rounded-md p-4 w-9/12 text-white" id="view{{ $deposit->id }}">
                                <div class="w-full flex justify-between">
                                    <p>Actions</p>
                                    <span class="material-icons cursor-pointer select-none" onclick="closeModal()">close</span>
                                </div>
                                <div class="w-full h-auto my-6">
                                    <img src="{{ env('APP_URL') }}/{{ $deposit->proof_path }}" alt="img">
                                </div>
                                <div class="flex justify-between gap-4 my-4">
    
                                    <form action="{{ route('approveDeposit') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $deposit->id }}" hidden>
                                        <input type="submit" value="Approve" class="cursor-pointer w-full bg-green-500 p-2 rounded-md">
                                    </form>
    
                                    <form action="{{ route('declineDeposit') }}" method="post">
                                        @csrf
                                        <input type="text" name="id" value="{{ $deposit->id }}" hidden>
                                        <input type="submit" value="Decline" class="cursor-pointer w-full bg-red-500 p-2 rounded-md">
                                    </form>
    
                                </div>
    
                            </dialog>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $deposits->links() }}
        </div>
    @endif
</div>
<script>
    const openModal = () => {
        let id = event.target.getAttribute('data-toggle-modal')
        let modal = document.querySelector(`#view${id}`)
        return modal.showModal()
    }

    const closeModal = () => {
        return event.target.parentNode.parentNode.close()
    }

</script>
@endsection