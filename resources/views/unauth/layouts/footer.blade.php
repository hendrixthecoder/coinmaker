<footer class="mt-24 p-4 lg:py-10 lg:px-32 bg-gray-100">
    <div class="lg:flex mb-16">
        <div class="w-full text-sm">
            <p class="mt-20 text-4xl">Logo here</p>

            <div class="flex flex-col gap-4 text-gray-500">
                <div class="mt-10 flex gap-4 hover:text-blue-500">
                    <span class="material-icons">map</span>
                    <p class=" hover:text-blue-500 cursor-pointer">5 Richbell Place LONDON WC1N 3LB</p>
                </div>
    
                <div class="flex gap-4 hover:text-blue-500">
                    <span class="material-icons">call</span>
                    <p class=" hover:text-blue-500 cursor-pointer">+1 (000) trusttradefinance</p>
                </div>
    
                <div class=" flex gap-4 hover:text-blue-500">
                    <span class="material-icons">forward_to_inbox</span>
                    <p class="hover:text-blue-500 cursor-pointer">support@trusttradefi.co</p>
                </div>
            </div>
        </div>
        <div class="w-full text-sm text-gray-500 max-lg:mt-12">
            <div class="grid grid-cols-2 lg:grid lg:grid-cols-4 gap-y-6">
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg text-black font-medium">Quick Links</h3>
                    <a class=" hover:text-blue-500" href="{{ route('plans') }}">Standard Plans</a>
                    <a class=" hover:text-blue-500" href="">Affiliate System</a>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg text-black font-medium">Company</h3>
                    <a href="{{ route('about') }}" class="hover:text-blue-500">About Us</a>
                    <a class=" hover:text-blue-500" href="{{ route('contact') }}">Reach Us</a>
                    <a class=" hover:text-blue-500" href="{{ route('login') }}">Log In</a>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg text-black font-medium">More</h3>
                    <a class=" hover:text-blue-500" href="">Cryptocurrency</a>
                    <a class=" hover:text-blue-500" href="">Affiliates and Partners</a>
                    <a class=" hover:text-blue-500" href="">Stocks</a>
                </div>
                <div class="flex flex-col gap-4">
                    <h3 class="text-lg text-black font-medium">Resources</h3>
                    <a class=" hover:text-blue-500" href="{{ route('contact') }}">Raise a Dispute</a>
                    <a class=" hover:text-blue-500" href="{{ route('userDashboard') }}">Your account</a>
                </div>
            </div>
        </div>
    </div>
    <div class="border border-gray-200 my-10"></div>

    <div class="lg:flex justify-between text-gray-500 my-10">
        <p>Privacy Policy / Terms & Conditions</p>
        <div class="flex gap-3 max-lg:mt-6">
            <a href="" class="bg-gray-200 p-2 px-3 rounded-md hover:bg-gray-100">
                <span class="ri-instagram-line"></span>
            </a>
            <a href="" class="bg-gray-200 p-2 px-3 rounded-md hover:bg-gray-100">
                <span class="ri-twitter-line"></span>
            </a>
            <a href="" class="bg-gray-200 p-2 px-3 rounded-md hover:bg-gray-100">
                <span class="ri-telegram-line"></span>
            </a>
        </div>
    </div>
    <div class="lg:text-center text-sm text-gray-500 flex flex-col gap-4 mb-8">
        <p>{{ env('APP_NAME') }}. {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->year }}. All rights reserved.</p>
        <p>When you visit or interact with our sites, services or tools, we or our authorised service providers may use cookies for storing information to help provide you with a better, faster and safer experience and for marketing purposes.</p>
    </div>
</footer>