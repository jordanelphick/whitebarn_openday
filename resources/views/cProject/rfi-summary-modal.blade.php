<!-- RFI Summary Modal -->
<div x-data="{ open: @entangle('showRfiSummaryModal').defer }">
    <template x-if="open">
        <div id="RfiSummaryModal" class="{{($selectedWorkpackage?'':'hidden')}} relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class=" fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    @if($selectedWorkpackage)
                        <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-screen-lg sm:p-6">
                            <div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Open RFIs - {{ $selectedWorkpackage->name }}</h3>
                                </div>

                                <x-table class="mt-2">
                                    <x-slot name="head">
                                        <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">RFI Number</x-table-heading>
                                        <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">Description</x-table-heading>
                                        <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">Status</x-table-heading>
                                    </x-slot>
                                    <x-slot name="body">
                                        @foreach($selectedWorkpackage->rfis as $Rfi)
                                            <x-table-row>
                                                <x-table-cell fontWeight="font-semibold">{{ $Rfi->number }}</x-table-cell>
                                                <x-table-cell fontWeight="font-semibold">{{ $Rfi->name }}</x-table-cell>
                                                <x-table-cell fontWeight="font-semibold">{{ $Rfi->status }}</x-table-cell>
                                            </x-table-row>
                                        @endforeach
                                    </x-slot>
                                </x-table>
                            </div>
                            <div class="mt-5 sm:mt-6 flex justify-end">
                                <div class="space-x-3">
                                    <button wire:click="btnCancelModal"  type="button" class="w-24 flex-shrink-0 inline-flex justify-center rounded-md bg-white px-4 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</button>
                                    <button wire:click="btnSaveQuickEditWorkpackageModal" type="button" class="w-24 flex-shrink-0 inline-flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </div>




                        </div>
                    @endif
                </div>
            </div>
        </div>

    </template>
</div>
<!-- END Edit Workpackage Modal -->


