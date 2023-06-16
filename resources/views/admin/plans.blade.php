@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-col gap-4 w-full">
        @if (Session::has('success'))
            <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
        @endif

        <button class="p-2 flex gap-2 w-40 bg-blue-500 rounded-md" data-toggle="modal" onclick="openCreateModal()">
            <span class="material-icons">add</span>
            Add New Plan
        </button>

        <dialog class="rounded-md w-9/12 max-w-lg text-white bg-deep-blue p-4 transition-all duration-500"  id="create">
            <div class="w-full flex justify-between">
                <p class="font-medium text-lg">Create new Investment Plan</p>
                <span class="material-icons cursor-pointer" onclick="closeModal()">close</span>
            </div>
            <form action="{{ route('admin.create.plans') }}" method="post" class="my-6 flex flex-col gap-4">
                @csrf
                <div class="flex flex-col gap-2">
                    <label for="name">Plan Name:</label>
                    <input type="text" required name="plan_name" id="name" class="w-full p-3 rounded-md shadow outline-none bg-light-blue">
                    <p class="text-xs">Should be one word and have no spaces.</p>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="name">Minimum Deposit:</label>
                    <input type="text" required name="min_deposit" id="name" class="w-full p-3 rounded-md shadow outline-none bg-light-blue">
                    <p class="text-xs">No commas or currency, just the amount in digits.</p>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="name">Maximum Deposit:</label>
                    <input type="text" required name="max_deposit" id="name" class="w-full p-3 rounded-md shadow outline-none bg-light-blue">
                    <p class="text-xs">No commas or currency, just the amount in digits.</p>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="name">Percentage Earning(ROI %):</label>
                    <input type="text" required name="weekly_earnings" id="name" class="w-full p-3 rounded-md shadow outline-none bg-light-blue">
                    <p class="text-xs">Percentage to be recieved weekly. No percentage sign, just the digit.</p>
                </div>
                <input type="submit" value="Submit" class="bg-blue-500 p-2 rounded-md text-white cursor-pointer">
            </form>
        </dialog>

        @if ($plans->isEmpty())
            <p class="rounded-md p-3 shadow-lg text-white bg-light-blue">There are currently no investment plans in the system, click the icon above to create one.</p>
        @else
        <div class="m-6">
            <h1 class="font-bold text-4xl">Investment Plans</h1>
        </div>
        <div class="border-t border-neutral-600"></div>
            <div class="lg:grid lg:grid-cols-3 flex flex-col gap-4">
                @foreach ($plans as $plan)                    
                    <div class="bg-light-blue shadow-lg border border-neutral-800 rounded-md p-6 flex flex-col gap-3">
                        <div class="flex justify-between">
                            <h2>Plan Name:</h2>
                            <p class="text-blue-400">{{ $plan->plan_name }}</p>
                        </div>
                        <div class="flex justify-between">
                            <h2>Minimum Deposit:</h2>
                            <p class="text-blue-400">${{ $plan->min_deposit }}</p>
                        </div>
                        <div class="flex justify-between">
                            <h2>Maximum Deposit:</h2>
                            <p class="text-blue-400">${{ $plan->max_deposit }}</p>
                        </div>
                        <div class="flex justify-between">
                            <h2>Duration:</h2>
                            <p class="text-blue-400">{{ $plan->duration }} weeks</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script>
        const openCreateModal = () => {
            let modal = document.querySelector('#create')
            return modal.showModal()
        } 

        const closeModal = () => event.target.parentNode.parentNode.close()

    </script>
@endsection