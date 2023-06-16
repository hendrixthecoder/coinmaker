@extends('user.layouts.app')
@section('content')
<div class="flex flex-col w-full gap-6 mb-10">
    <div class="m-6 mb-2">
        <h1 class="font-bold text-3xl">My Plans</h1>
    </div>
    <div class="border-b select-none  border-neutral-600 flex space-x-14 pl-10 transition-all duration-500">
        <div class="flex  gap-4 gap-x-16">
            <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="bronze">Bronze</h2>
            <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="silver">Silver</h2>
            <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="gold">Gold</h2>
        </div>
    </div>

    <section aria-describedby="bronze" data="pointer" class="">
        <div class="w-full rounded-md p-3 bg-light-blue">
            @if ($bronze_plans->isEmpty())
                No records exist.
            @else
                <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
                    <div class="overflow-auto w-full">
                        <table class="text-center w-full">
                            <thead>
                                <tr class="">
                                    <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                                    <th class="border border-neutral-600 p-2" scope="col">Weeks Left</th>
                                    <th class="border border-neutral-600 p-2" scope="col">Date Bought</th>
                                    <th class="border border-neutral-600 p-2" scope="col">Profit Expcted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bronze_plans as $bronze_plan) 
                                    <tr class="">
                                        <td class="border p-2 border-neutral-600">${{ $bronze_plan->amount }}</td>
                                        <td class="border p-2 border-neutral-600">{{ $bronze_plan->days_left }}</td>
                                        <td class="border p-2 border-neutral-600">{{ $bronze_plan->created_at }}</td>
                                        <td class="border p-2 border-neutral-600">${{ $bronze_plan->plan_profit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $bronze_plans->links() }}
                </div>
            @endif
        </div>
    </section>
    <section aria-describedby="silver" data="pointer" class="hidden" >
        <div class="w-full rounded-md p-3 bg-light-blue">
            @if ($silver_plans->isEmpty())
                No records exist.
            @else
            <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
                <div class="overflow-auto w-full">
                    <table class="text-center w-full">
                        <thead>
                            <tr class="">
                                <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                                <th class="border border-neutral-600 p-2" scope="col">Weeks Left</th>
                                <th class="border border-neutral-600 p-2" scope="col">Date Bought</th>
                                <th class="border border-neutral-600 p-2" scope="col">Profit Expected</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($silver_plans as $silver_plan) 
                            <tr class="">
                                <td class="border p-2 border-neutral-600">${{ $silver_plan->amount }}</td>
                                <td class="border p-2 border-neutral-600">{{ $silver_plan->days_left }}</td>
                                <td class="border p-2 border-neutral-600">{{ $silver_plan->created_at }}</td>
                                <td class="border p-2 border-neutral-600">${{ $silver_plan->plan_profit }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $silver_plans->links() }}
            </div>
            @endif
        </div>
    </section> 
    <section aria-describedby="gold" data="pointer" class="hidden">
        <div class="w-full rounded-md p-3 bg-light-blue">
            @if ($gold_plans->isEmpty())
                No records exist.
            @else
            <div class="overflow-auto w-full">
                <table class="text-center w-full">
                    <thead>
                        <tr class="">
                            <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                            <th class="border border-neutral-600 p-2" scope="col">Weeks Left</th>
                            <th class="border border-neutral-600 p-2" scope="col">Date Bought</th>
                            <th class="border border-neutral-600 p-2" scope="col">Profit Expected</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gold_plans as $gold_plan) 
                        <tr class="">
                            <td class="border p-2 border-neutral-600">${{ $gold_plan->amount }}</td>
                            <td class="border p-2 border-neutral-600">{{ $gold_plan->days_left }}</td>
                            <td class="border p-2 border-neutral-600">{{ $gold_plan->created_at }}</td>
                            <td class="border p-2 border-neutral-600">${{ $gold_plan->plan_profit }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $gold_plans->links() }}
            @endif
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        //set the account tab bottom border color to blue
        $('[data-toggle-target="bronze"]').addClass('border-b-2 border-blue-500')

        //function
        $('[data-toggle="pointer"]').click(function () {
            $('[data-toggle="pointer"]').removeClass('border-blue-500 border-b-2')
            $('[data="pointer"]').hide()

            let target = event.target.getAttribute('data-toggle-target')

            $(event.target).toggleClass('border-blue-500 border-b-2')
            $(`[aria-describedby=${target}]`).show()
        })
    })
</script>
@endsection