@extends('unauth.layouts.app')

@section('content')
    <div class="flex justify-between w-full my-6">
        <div>
            <div class="text-4xl text-black font-medium lg:text-6xl">
                Invest with confidence on the world's leading investment platform
            </div>
            <div class="text-gray-500 my-3">Join millions who've already discovered smarter investing in multiple types of assets. Choose an investment product to start with.</div>
            <div class="flex gap-7 items-center my-9">
                <a href="{{ route('register') }}" class="px-9 py-4 bg-blue-500 text-white rounded-md">Get Started</a>
                <a href="{{ route('login') }}" class="flex gap-1 text-blue-500">
                    Sign In
                    <span class="material-icons">login</span>
                </a>
            </div>
        </div>
        <div class="max-sm:hidden">
            <img src="{{ asset('images/hero-maker.png') }}" alt="">
        </div>
    </div>
    <div class="mt-32 md:flex">
        <div class="">
            <p class="text-3xl text-black font-medium">
                Few reasons why you should choose us
            </p>
            <p class="text-gray-500 my-3">
                Trust Trade Finance is the best and safest savings and investment firm, was established to provide intelligent portfolios with its expert investors, customer-priority approach, safe and high-tech investment tools. Trust Trade Finance provides its clients with free insurance purchased from Lloyd’s of London, one of the world’s leading providers of specialist insurance, giving coverage of up to 1 million Euro, GBP,USD or AUD (depending on the region). The insurance is given automatically to all Trust Trade Finance clients — there is no need to register.
            </p>
            <ul class="flex flex-col gap-5 mt-9">
                <div class="flex gap-4 items-center">
                    <div class="rounded-full p-3 bg-gray-200 flex">
                        <span class="material-icons text-blue-500">verified</span>
                    </div>
                    <li>Account Certified Privacy</li>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="rounded-full p-3 bg-gray-200 flex">
                        <span class="material-icons text-blue-500">shopping_cart_checkout</span>
                    </div>
                    <li>Claim profit anytime</li>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="rounded-full p-3 bg-gray-200 flex">
                        <span class="material-icons text-blue-500">account_balance_wallet</span>
                    </div>
                    <li>Buy plans with coupon</li>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="rounded-full p-3 bg-gray-200 flex">
                        <span class="material-icons text-blue-500">add_card</span>
                    </div>
                    <li>Investment bonuses</li>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="rounded-full p-3 bg-gray-200 flex">
                        <span class="material-icons text-blue-500">security</span>
                    </div>
                    <li>Top notched security</li>
                </div>
                <div class="flex gap-4 items-center">
                    <div class="rounded-full p-3 bg-gray-200 flex">
                        <span class="material-icons text-blue-500">support_agent</span>
                    </div>
                    <li>24/7 customer support</li>
                </div>
            </ul>
        </div>
        <img class="aspect-square md:w-1/2 object-contain" src="{{ asset('images/woman-hero.png') }}" alt="">
    </div>

    <p class="text-center text-sm text-gray-500 font-black mt-16">HOW IT WORKS</p>

    <div class=" lg:grid lg:grid-cols-3 my-6">
        <div class="">
            <div class="my-5">
            <h3 class="font-medium text-lg my-2">Account Setup</h3> 
            <p class="text-gray-500 mb-10">Only 1 minute and you're in. Enter the information you need to become a member and start right away</p>
            <h3 class="font-medium text-lg my-2">Select a plan that suites your budget</h3> 
            <p class="text-gray-500 mb-10">Select a standard plan, a project that suits your budget or a saving plan with a good duration and interest</p>
            </div>
        </div>
        <img src="{{ asset('images/lap.png') }}" alt="">
        <div class="">
            <div class="my-5">
            <h3 class="font-medium text-lg my-2">Watch your investment grow</h3> 
            <p class="text-gray-500 mb-10">Invest and sit back. You can follow your investment status at any time and invest in limited time special offers.</p>
            <h3 class="font-medium text-lg my-2">Payout Day</h3> 
            <p class="text-gray-500 mb-10">Your investment is eligible to withdraw anytime after the first 24 hours.</p>
            </div>
        </div>
    </div>
    <div class="mt-32">
        <h3 class="text-center text-3xl font-medium">Find the right plan for you</h3>
        <p class="text-gray-500 text-center">Investment & Savings solution that is affordable</p>
        
    </div>
    <div class="my-32">
        <p class="text-center text-sm text-gray-500 font-black mt-16">REVIEWS</p>
        <h3 class="text-center text-3xl font-medium">Backed by strong global partners</h3>
    </div>
    {{-- Testimonial slider starts here --}}

    {{-- Testimonial slider ends here --}}
@endsection