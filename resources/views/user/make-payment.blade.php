@extends('user.layouts.app')

@section('content')
    <div class="m-6">
        <h1 class="font-bold text-4xl">Make Payment</h1>
    </div>
    <p class="mb-6">You are to make a payment, using your preferred mode of payment, of ${{ Session::get('amount') }}</p>
    <div class="border-t-gray-950 border-[0.2px]"></div>
    @if ($errors->any())
        <ul class="flex flex-col gap-3">
            @foreach ($errors->all() as $error)
                <li class="text-white rounded-md bg-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="my-6 ">
        <div id="accordionExample5">
            <div
              class="rounded-t-lg border border-neutral-200 bg-white dark:border-light-blue dark:bg-light-blue">
              <h2 class="mb-0" id="headingOne5">
                <button
                  class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-light-blue dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-light-blue dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-target="#collapseOne5"
                  aria-expanded="true"
                  aria-controls="collapseOne5">
                  BTC
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="collapseOne5"
                class="!visible"
                data-te-collapse-item
                data-te-collapse-show
                aria-labelledby="headingOne5">
                <div class="px-5 py-4">
                  <strong>This is the first item's accordion body.</strong> It is
                  shown by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div
              class="border border-t-0 border-neutral-200 bg-white dark:border-light-blue dark:bg-light-blue">
              <h2 class="mb-0" id="headingTwo5">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-light-blue dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-light-blue dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#collapseTwo5"
                  aria-expanded="false"
                  aria-controls="collapseTwo5">
                  ETH
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="collapseTwo5"
                class="!visible hidden"
                data-te-collapse-item
                aria-labelledby="headingTwo5">
                <div class="px-5 py-4">
                  <strong>This is the second item's accordion body.</strong> It is
                  hidden by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
            <div
              class="rounded-b-lg border border-t-0 border-neutral-200 bg-white dark:border-light-blue dark:bg-light-blue">
              <h2 class="mb-0" id="headingThree5">
                <button
                  class="group relative flex w-full items-center border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-light-blue dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-light-blue dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)] [&[data-te-collapse-collapsed]]:rounded-b-[15px] [&[data-te-collapse-collapsed]]:transition-none"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#collapseThree5"
                  aria-expanded="false"
                  aria-controls="collapseThree5">
                  USDT
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="collapseThree5"
                class="!visible hidden"
                data-te-collapse-item
                aria-labelledby="headingThree5">
                <div class="px-5 py-4">
                  <strong>This is the third item's accordion body.</strong> It is
                  hidden by default, until the collapse plugin adds the appropriate
                  classes that we use to style each element. These classes control
                  the overall appearance, as well as the showing and hiding via CSS
                  transitions. You can modify any of this with custom CSS or
                  overriding our default variables. It's also worth noting that just
                  about any HTML can go within the <code>.accordion-body</code>,
                  though the transition does limit overflow.
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="my-6">
        <form action="" method="post" class="flex flex-col gap-6" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{ Session::get('amount') }}" name="amount" hidden>
            <div class="flex flex-col gap-3">
                <label for="source">Payment Source:</label>
                <select name="source" required id="source" class=" bg-light-blue rounded-md p-4 outline-none">
                    <option value="">Selected method used</option>
                    <option value="BTC">BTC</option>
                    <option value="ETH">ETH</option>
                    <option value="USDT">USDT</option>
                </select>
            </div>

            <div class="flex flex-col gap-3">
                <label for="proof">Payment Proof:</label>
                <input type="file" name="proof" id="proof" required class="rounded-md bg-light-blue p-3 outline-none">
            </div>

            <input type="submit" value="Submit" class="cursor-pointer rounded-md shadow-lg bg-light-blue p-3 w-24">
            
        </form>
    </div>

@endsection