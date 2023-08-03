<div>


    <div class="flex items-center justify-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        <div class="w-96 px-6 pb-10 text-center bg-white rounded-lg shadow-lg">
            <div class="mt-3 sm:mt-5">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-70 px-20 mx-auto mb-4">
                <h1 class="text-xl font-bold pb-1 text-gray-900">Open Day</h1>
                <h3>6th August 2023</h3>
            </div>
            <div class="mt-3 text-left sm:mt-5">
                <div class="col-span-full">
                    <label  class="block text-sm font-medium leading-6 text-gray-900">Enter Your Email Address</label>
                    <div class="mt-1">
                        <input wire:model="emailAddress" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('emailAddress') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <p class="text-gray-500 text-sm">This is the sam email address that you used to order your Tickets through Oztix</p>

                </div>
            </div>

            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                <button wire:click="btnLogin" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Login</button>
            </div>


        </div>
    </div>
</div>
