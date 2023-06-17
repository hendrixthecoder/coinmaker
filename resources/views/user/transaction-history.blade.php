@extends('user.layouts.app')
@section('title', 'Transaction History')
@section('content')
    <div class="flex flex-col w-full gap-6 mb-10">
        <div class="m-6 mb-2">
            <h1 class="font-bold text-3xl">Transaction History</h1>
        </div>
        <div class="border-b select-none  border-neutral-600 flex space-x-14 pl-10 transition-all duration-500">
            <div class="flex max-sm:grid max-sm:grid-cols-2 gap-4 gap-x-16">
                <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="top-up">Admin Top-Up</h2>
                <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="roi">ROI</h2>
                <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="reversal">Reversal</h2>
                <h2 class="hover:border-b-2 pb-3 text-lg cursor-pointer" data-toggle="pointer" data-toggle-target="cap-return">Capital Return</h2>
            </div>
        </div>

        <section aria-describedby="top-up" data="pointer" class="">
            <div class="w-full rounded-md p-3 bg-light-blue">
                @if ($transactions->isEmpty())
                    No records exist.
                @else
                    <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
                        <div class="overflow-auto w-full">
                            <table class="text-center w-full">
                                <thead>
                                    <tr class="">
                                        <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                                        <th class="border border-neutral-600 p-2" scope="col">Status</th>
                                        <th class="border border-neutral-600 p-2" scope="col">Date Made</th>
                                        <th class="border border-neutral-600 p-2" scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction) 
                                        <tr class="">
                                            <td class="border p-2 border-neutral-600">${{ $transaction->amount }}</td>
                                            <td class="border p-2 border-neutral-600">{{ $transaction->status }}</td>
                                            <td class="border p-2 border-neutral-600">{{ $transaction->created_at }}</td>
                                            <td class="border p-2 border-neutral-600">{{ $transaction->source }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $transactions->links() }}
                    </div>
                @endif
            </div>
        </section>
        <section aria-describedby="roi" data="pointer" class="hidden" >
            <div class="w-full rounded-md p-3 bg-light-blue">
                @if ($roi->isEmpty())
                    No records exist.
                @else
                <div class="rounded-md p-5 bg-light-blue flex flex-col gap-4">
                    <div class="overflow-auto w-full">
                        <table class="text-center w-full">
                            <thead>
                                <tr class="">
                                    <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                                    <th class="border border-neutral-600 p-2" scope="col">Status</th>
                                    <th class="border border-neutral-600 p-2" scope="col">Date Made</th>
                                    <th class="border border-neutral-600 p-2" scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roi as $credit) 
                                    <tr class="">
                                        <td class="border p-2 border-neutral-600">${{ $credit->amount }}</td>
                                        <td class="border p-2 border-neutral-600">{{ $credit->status }}</td>
                                        <td class="border p-2 border-neutral-600">{{ $credit->pay_day }}</td>
                                        <td class="border p-2 border-neutral-600">{{ $credit->source }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $transactions->links() }}
                </div>
                @endif
            </div>
        </section> 
        <section aria-describedby="reversal" data="pointer" class="hidden">
            <div class="w-full rounded-md p-3 bg-light-blue">
                @if ($reversals->isEmpty())
                    No records exist.
                @else
                <div class="overflow-auto w-full">
                    <table class="text-center w-full">
                        <thead>
                            <tr class="">
                                <th class="border border-neutral-600 p-2" scope="col">Amount</th>
                                <th class="border border-neutral-600 p-2" scope="col">Status</th>
                                <th class="border border-neutral-600 p-2" scope="col">Date Made</th>
                                <th class="border border-neutral-600 p-2" scope="col">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reversals as $reversal) 
                                <tr class="">
                                    <td class="border p-2 border-neutral-600">${{ $reversal->amount }}</td>
                                    <td class="border p-2 border-neutral-600">{{ $reversal->status }}</td>
                                    <td class="border p-2 border-neutral-600">{{ $reversal->created_at }}</td>
                                    <td class="border p-2 border-neutral-600">{{ $reversal->source }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $reversals->links() }}
                @endif
            </div>
        </section>
        <section aria-describedby="cap-return" data="pointer" class="hidden">
            <div class="w-full rounded-md p-3 bg-light-blue">
                @if ($capitalReturns->isEmpty())
                    No records exist.
                @else
                    
                @endif
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function () {
            //set the account tab bottom border color to blue
            $('[data-toggle-target="top-up"]').addClass('border-b-2 border-blue-500')

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