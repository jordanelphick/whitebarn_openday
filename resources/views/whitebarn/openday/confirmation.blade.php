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
                <label class="block text-sm font-medium leading-6 text-gray-900">Your Name</label>
                <div class="mt-1">
                    <input wire:model="userName" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('userName') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="mt-6 text-left sm:mt-3">
            <div class="col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Enter Your Partner's Name</label>
                <div class="mt-1">
                    <input wire:model="partnerName" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('partnerName') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-6 text-left sm:mt-3">
            <div class="col-span-full">
                <label class="block text-sm font-medium leading-6 text-gray-900">Your Mobile Number</label>
                <div class="mt-1">
                    <input wire:model="mobile"  type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('mobile') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mt-2 text-left sm:mt-3">
            <div class="col-span-full">

                <div>
                    <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Are you Attending Open Day?</label>
                    <select wire:model="selectAttending" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                        <option {{($selectAttending=='no'?'selected':'')}} value="no">no</option>
                        <option {{($selectAttending=='yes'?'selected':'')}} value="yes">yes</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mt-2 text-left sm:mt-3">
            <div class="col-span-full">

                <div>
                    <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Number of Seats required</label>
                    <select wire:model="selectTicketQty" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                            <option {{($selectTicketQty==1?'selected':'')}} value="1">1</option>
                            <option {{($selectTicketQty==2?'selected':'')}} value="2">2</option>
                            <option {{($selectTicketQty==3?'selected':'')}} value="3">3</option>
                            <option {{($selectTicketQty==4?'selected':'')}} value="4">4</option>
                            <option {{($selectTicketQty==5?'selected':'')}} value="5">5</option>
                            <option {{($selectTicketQty==6?'selected':'')}} value="6">6</option>
                            <option {{($selectTicketQty==7?'selected':'')}} value="7">7</option>
                            <option {{($selectTicketQty==8?'selected':'')}} value="8">8</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
            <button wire:click="btnSave" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Save</button>
        </div>
        <div class="mt-6 text-left sm:mt-3">
            <p class="text-gray-700 text-md">Notes about the day:</p>
            <p class="text-gray-500 text-sm">Please don't be late we are commencing registration at 10:45am and kick off will be at 11am sharp.</p>
            <p class="text-gray-500 text-sm">Car parking spaces are limited, please consider car pooling where possible</p>
        </div>
    </div>

</div>
