<!-- quick Edit Workarea Modal -->
<div x-data="{ open: @entangle('showQuickEditWorkareaModal').defer }">
    <template x-if="open">
        <div id="quickEditWorkareaModal" class="{{($selectedWorkarea?'':'hidden')}} relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class=" fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    @if($selectedWorkarea)
                        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                            <div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{ ($selectedWorkarea->id?'Edit':'New') }} Workarea</h3>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="col-span-full">
                                        <label for="quickEditWorkarea-id" class="block text-sm font-medium leading-6 text-gray-900">Workarea ID</label>
                                        <div class="mt-2">
                                            <input disabled type="text" name="quickEditWorkarea-id" id="quickEditWorkarea-id" autocomplete="quickEditWorkarea-number" value="{{$selectedWorkarea->id}}" class="cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="col-span-full">
                                        <label for="quickEditWorkarea-name" class="block text-sm font-medium leading-6 text-gray-900">Workarea Name</label>
                                        <div class="mt-2">
                                            <input wire:model="workareaName" type="text" name="quickEditWorkarea-name" id="quickEditWorkarea-name" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3 text-left sm:mt-5">
                                    <div class="mt-2">
                                        <label for="quickEditWorkarea-number" class="block text-sm font-medium leading-6 text-gray-900">Workarea Number</label>
                                        <div class="mt-2">
                                            <input wire:model="workareaNumber" type="text" name="quickEditWorkarea-number" id="quickEditWorkarea-number" autocomplete="quickEditWorkarea-number"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                <button wire:click="btnSaveQuickEditWorkareaModal" type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Save</button>
                                <button wire:click="btnCancelModal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </template>
</div>
<!-- END quick Edit Workarea Modal -->
