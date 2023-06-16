@extends('user.layouts.app')
@section('content')
    <div class="m-6 flex flex-col gap-4 text-center">
        <h1 class="font-bold text-4xl">Available Plans</h1>
        <p>Below is a list of the current investment plans supported. ROI on each plan is paid weekly (7 day period) for the duration of your plan.</p>
    </div>
    <div class="border-t border-neutral-700"></div>
    @if (Session::has('success'))
        <p class="rounded-md my-4 bg-green-500 p-3 text-white">{{ Session::get('success') }}</p>
    @endif
    @if (Session::has('error'))
        <p class="rounded-md my-4 bg-red-500 p-3 text-white">{{ Session::get('error') }}</p>
    @endif
    @if ($plans->isEmpty())
            <p class="rounded-md p-3 shadow-lg my-7 text-white bg-light-blue">There are currently no investment plans in the system, click the icon above to create one.</p>
        @else
            <div class="lg:grid lg:grid-cols-3 flex flex-col my-4 gap-4">
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
                        <form action="{{ route('joinPlan') }}" method="post" class="flex flex-col gap-4">
                            @csrf
                            <div class="flex justify-between items-center">
                                <label for="amount">Amount:</label>
                                <input type="number" min="{{ $plan->min_deposit }}" max="{{ $plan->max_deposit }}" name="amount" id="amount" value="{{ $plan->min_deposit }}" class="rounded-md p-3 bg-deep-blue border border-neutral-800 outline-none shadow">
                            </div>
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <input type="submit" value="Join Plan" class="bg-blue-500 cursor-pointer rounded-md w-full p-2 text-white">

                        </form>
                    </div>
                @endforeach
        @endif

@endsection