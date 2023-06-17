<dialog id="credit{{ $user->id }}" class="w-9/12 max-w-2xl p-4 text-white bg-deep-blue shadow-lg rounded-md">
    <div class="w-full flex justify-between ">
        <p>Credit User</p>
        <span class="material-icons select-none cursor-pointer" onclick="closeModal(event)">close</span>
    </div>
    <form action="{{ route('creditUser') }}" class="my-4" method="post">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" required class="bg-light-blue rounded-md shadow-lg w-full p-4 outline-none">
        </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="submit" value="Credit" class="bg-green-500 p-2 my-4 cursor-pointer rounded-md w-full text-white">
    </form>
</dialog>

<dialog id="debit{{ $user->id }}" class="w-9/12 max-w-2xl p-4 text-white bg-deep-blue shadow-lg rounded-md">
    <div class="w-full flex justify-between ">
        <p>Debit User</p>
        <span class="material-icons select-none cursor-pointer" onclick="closeModal(event)">close</span>
    </div>
    <form action="{{ route('debitUser') }}" class="my-4" method="post">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="amount">Amount:</label>
            <input type="text" name="amount" required class="bg-light-blue rounded-md shadow-lg w-full p-4 outline-none">
        </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="submit" value="Debit" class="bg-red-500 p-2 my-4 cursor-pointer rounded-md w-full text-white">
    </form>
</dialog>