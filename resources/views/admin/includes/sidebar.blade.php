<div class="top-0 z-50 left-[-300px] text-white bg-deep-blue shadow-lg duration-500 border border-neutral-800 fixed bottom-0 p-4 w-[290px] overflow-y-auto" id="navMenu">
    <div class="flex justify-between items-center mb-3">
        <p class="text-lg font-medium">Welcome {{ Auth::user()->first_name }}</p>
        <div class="bg-gray-200 p-2 rounded-md flex cursor-pointer" data-toggle="nav">
            <span class="material-icons text-blue-500 select-none">close</span>
        </div>
    </div>
    <div class="my-3 flex flex-col gap-6">
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('admin.dashboard')) text-blue-500 @endif">
            <span class="material-icons">dashboard</span>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('manageUsers')) text-blue-500 @endif">
            <span class="material-icons ">groups</span>
            <a href="{{ route('manageUsers') }}">Manage Users</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('manageDeposits')) text-blue-500 @endif">
            <span class="material-icons">add_card</span>
            <a href="{{ route('manageDeposits') }}">Manage Deposits</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('manageWithdrawals')) text-blue-500 @endif">
            <span class="material-icons">shopping_cart_checkout</span>
            <a href="{{ route('manageWithdrawals') }}">Manage Withdrawals</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('admin.plans')) text-blue-500 @endif">
            <span class="material-icons">savings</span>
            <a href="{{ route('admin.plans') }}">Investment Plans</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('editPaymentMethods')) text-blue-500 @endif">
            <span class="material-icons">settings</span>
            <a href="{{ route('editPaymentMethods') }}">Manage Payment Methods</a>
        </div>
        <div class="flex justify-between duration-300 hover:text-gray-500 cursor-pointer select-none" data-toggle="submenu">
            <div class="flex gap-3">
                <span class="material-icons">account_circle</span>
                <a  class="select-none cursor-pointer">Account</a>
            </div>
            <span class="material-icons cursor-pointer select-none transition-all " id="sub">chevron_right</span>
        </div>
        <div class="px-4">
            <div class="rounded-md p-4 bg-light-blue flex flex-col gap-3 text-sm duration-300 opacity-0 pointer-events-none" id="submenu">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="cursor-pointer hover:translate-x-4 duration-500" value="Log Out (Admin)">
                </form>
                {{-- <a href="" class="hover:translate-x-4 duration-500">Withdrawal Info</a> --}}
                {{-- <a href="" class="hover:translate-x-4 duration-500">Update Account</a> --}}
            </div>
        </div>
    </div>
</div>