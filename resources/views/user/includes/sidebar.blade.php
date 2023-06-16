<div class="top-0 bottom-0 z-50 left-[-300px] text-white bg-deep-blue shadow-lg border border-neutral-800 duration-300 fixed p-4 w-[290px] overflow-y-auto" id="navMenu">
    <div class="flex justify-between items-center mb-3">
        <p class="text-lg font-medium">Welcome {{ Auth::user()->first_name }}</p>
        <div class="bg-gray-200 p-2 rounded-md flex" data-toggle="nav">
            <span class="material-icons cursor-pointer text-blue-500 select-none" >close</span>
        </div>
    </div>
    <div class="my-3 flex flex-col gap-6">
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('userDashboard')) text-blue-500 @endif">
            <span class="material-icons">dashboard</span>
            <a href="{{ route('userDashboard') }}">Dashboard</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('deposits')) text-blue-500 @endif">
            <span class="material-icons">add_card</span>
            <a href="{{ route('deposits') }}">Deposits</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('withdrawals')) text-blue-500 @endif">
            <span class="material-icons">shopping_cart_checkout</span>
            <a href="{{ route('withdrawals') }}">Withdrawals</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('plans')) text-blue-500 @endif">
            <span class="material-icons">savings</span>
            <a href="{{ route('plans') }}">Investment Plans</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('userPlans')) text-blue-500 @endif">
            <span class="material-icons">monetization_on</span>
            <a href="{{ route('userPlans') }}">My Investment Plans</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500  @if (Route::is('transaction-history')) text-blue-500 @endif">
            <span class="material-icons">history</span>
            <a href="{{ route('transaction-history') }}">Transaction History</a>
        </div>
        <div class="flex gap-3 hover:text-gray-300 hover:translate-x-4 duration-500 @if (Route::is('support')) text-blue-500 @endif">
            <span class="material-icons">support_agent</span>
            <a href="{{ route('support') }}">Support</a>
        </div>
        <div class="flex justify-between cursor-pointer select-none" data-toggle="submenu">
            <div class="flex gap-3">
                <span class="material-icons">account_circle</span>
                <a  class="select-none cursor-pointer">Account</a>
            </div>
            <span class="material-icons cursor-pointer select-none transition-all"  id="sub">chevron_right</span>
        </div>
        <div class="px-4">
            <div class="rounded-md p-4 bg-light-blue flex flex-col gap-3 text-sm duration-300 opacity-0" id="submenu">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="cursor-pointer hover:translate-x-4 duration-500" value="Log Out ({{ Auth::user()->first_name }})">
                </form>
                <a href="{{ route('withdrawal-info') }}" class="hover:translate-x-4 duration-500 @if (Route::is('withdrawal-info')) text-blue-500 @endif">Withdrawal Info</a>
                <a href="{{ route('updateAccount') }}" class="hover:translate-x-4 duration-500 @if (Route::is('updateAccount')) text-blue-500 @endif">Update Account</a>
            </div>
        </div>
    </div>
</div>