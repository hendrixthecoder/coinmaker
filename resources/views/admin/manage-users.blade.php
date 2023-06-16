@extends('admin.layouts.app')
@section('content')
<div class="my-6">
    @if (Session::has('success'))
        <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
    @endif
    @if ($users->isEmpty())            
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
                            <th class="border border-neutral-600 p-2" scope="col">Name</th>
                            <th class="border border-neutral-600 p-2" scope="col">Email</th>
                            <th class="border border-neutral-600 p-2" scope="col">Country</th>
                            <th class="border border-neutral-600 p-2" scope="col">Phone Number</th>
                            <th class="border border-neutral-600 p-2" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user) 
                            <tr class="">
                                <td class="border p-2 border-neutral-600">{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td class="border p-2 border-neutral-600">{{ $user->email }}</td>
                                <td class="border p-2 border-neutral-600">{{ $user->country }}</td>
                                <td class="border p-2 border-neutral-600">{{ $user->number }}</td>
                                <td class="border p-2 border-neutral-600">
                                    <button class="rounded-md bg-blue-500 p-3 flex gap-1" onclick="openModal()" data-toggle-modal="{{ $user->id }}">
                                        <span class="material-icons">visibility</span>
                                        View
                                    </button>
                                </td>
                            </tr>
                            <dialog class="bg-deep-blue rounded-md p-4 w-9/12 text-white" id="view{{ $user->id }}">
                                <div class="w-full flex justify-between">
                                    <p>Actions</p>
                                    <span class="material-icons cursor-pointer select-none" onclick="closeModal()">close</span>
                                </div>
                                <div class="flex justify-between gap-4 my-4">
                                    @include('admin.includes.credit-debit-user')
                                    <button class="bg-green-500 rounded-md p-2 text-white" onclick="openCreditModal()" data-toggle-modal="credit{{ $user->id }}">Credit</button>
                                    <button class="bg-red-500 rounded-md p-2 text-white" onclick="openDebitModal()" data-toggle-modal="debit{{ $user->id }}">Debit</button>
                                </div>
                            </dialog>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $users->links() }}
        </div>
    @endif
</div>
<script>
    const openModal = () => {
        let id = event.target.getAttribute('data-toggle-modal')
        let modal = document.querySelector(`#view${id}`)
        return modal.showModal()
    }

    const openCreditModal = () => {
        let id = event.target.getAttribute('data-toggle-modal')
        let modal = document.querySelector(`#${id}`)
        modal.showModal()
    }

    const openDebitModal = () => {
        let id = event.target.getAttribute('data-toggle-modal')
        let modal = document.querySelector(`#${id}`)
        modal.showModal()
    }

    const closeModal = () => {
        return event.target.parentNode.parentNode.close()
    }

</script>
@endsection