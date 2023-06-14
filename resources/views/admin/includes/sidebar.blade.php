<div class="top-0 z-50 left-[-300px] text-white bg-deep-blue shadow-lg duration-500 fixed bottom-0 p-4 w-[290px] overflow-y-auto" id="navMenu">
    <div class="flex justify-between items-center mb-3">
        <p class="text-lg font-medium">Welcome {{ Auth::user()->first_name }}</p>
        <div class="bg-gray-200 p-2 rounded-md hover:rounded-full  flex">
            <span class="material-icons cursor-pointer text-blue-500 select-none" data-toggle="nav">close</span>
        </div>
    </div>
    <div class="my-3 flex flex-col gap-6">
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('admin.dashboard')) text-blue-900 @endif">
            <span class="material-icons">dashboard</span>
            <a href="{{ route('userDashboard') }}">Dashboard</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('manageDeposits')) text-blue-900 @endif">
            <span class="material-icons">add_card</span>
            <a href="{{ route('manageDeposits') }}">Manage Deposits</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500">
            <span class="material-icons">shopping_cart_checkout</span>
            <a href="">Withdrawals</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500">
            <span class="material-icons">savings</span>
            <a href="">Investment Plans</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500">
            <span class="material-icons">monetization_on</span>
            <a href="">My Investment Plans</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500">
            <span class="material-icons">history</span>
            <a href="">Transaction History</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500">
            <span class="material-icons">support_agent</span>
            <a href="">Support</a>
        </div>
        <div class="flex justify-between">
            <div class="flex gap-3">
                <span class="material-icons">account_circle</span>
                <a data-toggle="submenu" class="select-none cursor-pointer">Account</a>
            </div>
            <span class="material-icons cursor-pointer select-none" data-toggle="submenu" id="sub">chevron_right</span>
        </div>
        <div class="px-4">
            <div class="rounded-md p-4 bg-light-blue flex flex-col gap-3 text-sm hidden" id="submenu">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="cursor-pointer hover:translate-x-4 duration-500" value="Log Out">
                </form>
                <a href="" class="hover:translate-x-4 duration-500">Withdrawal Info</a>
                <a href="" class="hover:translate-x-4 duration-500">Update Account</a>
            </div>
        </div>
    </div>
</div>