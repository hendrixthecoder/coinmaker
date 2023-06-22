@extends('user.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="m-6">
        <h1 class="font-bold text-4xl">Dashboard</h1>
    </div>
    <div class="border border-neutral-600"></div>
    <div class="flex flex-col md:grid md:grid-cols-2 gap-5 my-6">
        <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
            <div class="flex gap-4">
                <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                    <span class="material-icons text-white">account_balance</span>
                </div>
                <div class="flex flex-col">
                    <p class="font-medium text-lg">Balance</p>
                    <p>${{ $balance }} USD</p>
                </div>
            </div>
        </div>
        <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
            <div class="flex gap-4">
                <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                    <span class="material-icons text-white">monetization_on</span>
                </div>
                <div class="flex flex-col">
                    <p class="font-medium text-lg">Total Profit</p>
                    <p>${{ $profit }} USD</p>
                </div>
            </div>
        </div>
        <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
            <div class="flex gap-4">
                <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                    <span class="material-icons text-white">sell</span>
                </div>
                <div class="flex flex-col">
                    <p class="font-medium text-lg">Total Active Packages</p>
                    <p>{{ $packages }}</p>
                </div>
            </div>
        </div>
        <div class=" bg-light-blue shadow-lg px-4 py-7 rounded-md">
            <div class="flex gap-4">
                <div class="p-4 bg-deep-blue shadow-lg rounded-full flex">
                    <span class="material-icons text-white">account_balance</span>
                </div>
                <div class="flex flex-col">
                    <p class="font-medium text-lg">Total Approved Withdrawals</p>
                    <p>${{ $withdrawals }} USD</p>
                </div>
            </div>
        </div>
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
        
        </div>

    </div>
    

  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
    {
        "symbol": "COINBASE:BTCUSD",
        "width": "100%",
        "height": "100%",
        "locale": "en",
        "dateRange": "12M",
        "colorTheme": "dark",
        "isTransparent": false,
        "autosize": true,
        "largeChartUrl": ""
    }
</script>
@endsection