<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('projects') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Projects') }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('project', $project->number) }}#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 flex justify-end">
        <button type="button" class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Work Area
        </button>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-table>
            <x-slot name="head">
                <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">WORK AREA</x-table-heading>
                <x-table-heading wire:click="sortBy('status')" :direction="$sortField ==='status' ? $sortDirection : null">STATUS</x-table-heading>
                <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">RECORDS</x-table-heading>
                <x-table-heading wire:click="sortBy('open_rfis')" :direction="$sortField ==='open_rfis' ? $sortDirection : null">RFIs</x-table-heading>

                <x-table-heading wire:click="sortBy('accountable_id')" :direction="$sortField ==='open_records' ? $sortDirection : null">Accountable</x-table-heading>
                <x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">UPDATED AT</x-table-heading>
                <x-table-heading></x-table-heading>
                <x-table-heading>Quick Edit</x-table-heading>
                <x-table-heading>Edit<span class="sr-only">Edit</span></x-table-heading>
            </x-slot>
            <x-slot name="body">
                @foreach($project->workareas as $workarea)
                    <x-table-row bgColour="bg-zinc-100">
                        <x-table-cell fontWeight="font-semibold">{{ $workarea->number . ". " . $workarea->name }}</x-table-cell>
                        <x-table-cell>{{ ($workarea->status==""?"":ucwords($workarea->status)) }}</x-table-cell>
                        <x-table-cell></x-table-cell>
                        <x-table-cell></x-table-cell>

                        <x-table-cell></x-table-cell>

                        <x-table-cell>{{ ($workarea->updated_at==null?"":Carbon\Carbon::parse($workarea->updated_at)->diffForHumans()) }}</x-table-cell>
                        <x-table-cell>
                            <svg wire:click="moveWorkarea({{ $workarea->id }}, -1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-3 h-3 mb-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                            </svg>
                            <svg wire:click="moveWorkarea({{ $workarea->id }}, +1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-3 h-3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                        </x-table-cell>
                        <x-table-cell>
                            <x-button-pencil wire:click="editWorkarea({{ $workarea->id }})"></x-button-pencil>
                        </x-table-cell>

                        <x-table-cell>

                        </x-table-cell>
                    </x-table-row>

                    @foreach($workarea->workpackages as $workpackage)
                        <x-table-row>
                            @php($userIsAccountablePerson = ($workpackage->user->id = Auth::id()?'true':'false'))
                            @php($recordCount = count($workpackage->records->where('status','=', 'open')))
                            @php($rfiCount = count($workpackage->rfis->where('status','=', 'open')))

                            <x-table-cell>{{ $workarea->number . "." . $workpackage->number . ". " . $workpackage->name }}</x-table-cell>
                            <x-table-cell>
                                @if($userIsAccountablePerson)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>Doc
                                @else
                                    {{ $workpackage->user->initials() }}
                               @endif
                            </x-table-cell>

                            <x-table-cell>{!!  ($recordCount>0?"<span class='inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700'>$recordCount Records</span>":'') !!}</x-table-cell>
                            <x-table-cell>{!!  ($rfiCount>0?"<span class='inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700'>$rfiCount RFIs</span>":'') !!}</x-table-cell>


                            <x-table-cell></x-table-cell>


                            <x-table-cell>{{ ($workpackage->updated_at==null?"":Carbon\Carbon::parse($workpackage->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell>
                                <svg wire:click="moveWorkpackage({{ $workpackage->id }}, -1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-3 h-3 mb-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                                </svg>
                                <svg wire:click="moveWorkpackage({{ $workpackage->id }}, +1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                                </svg>
                            </x-table-cell>
                            <x-table-cell>
                                <x-button-pencil wire:click="editWorkpackage({{ $workpackage->id }})"></x-button-pencil>
                            </x-table-cell>
                            <x-table-cell><a href="{{ route('workpackage', ['projectNumber'=>$project->number,'workareaName'=>str_replace(" ", "_", $workarea->name),'workpackageName'=>str_replace(" ", "_", $workpackage->name)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>


                    @endforeach
                @endforeach
            </x-slot>
        </x-table>
    </div>



    <x-dialog-modal title="Hello World" />



    <!-- Workarea Modal -->
    <div x-data="{ open: @entangle('selectedWorkarea').defer }">
        <template x-if="open">
            <div id="selectedWorkareaModal" class="{{($selectedWorkarea?'':'hidden')}} relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class=" fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        @if($selectedWorkarea)
                            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                                <div>
                                    <div class="mt-3 text-center sm:mt-5">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Edit Workarea</h3>
                                    </div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="col-span-full">
                                            <label for="selectedWorkarea-id" class="block text-sm font-medium leading-6 text-gray-900">Workarea ID</label>
                                            <div class="mt-2">
                                                <input disabled type="text" name="selectedWorkarea-id" id="selectedWorkarea-id" autocomplete="selectedWorkarea-number" value="{{$selectedWorkarea->id}}" class="cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="col-span-full">
                                            <label for="selectedWorkarea-number" class="block text-sm font-medium leading-6 text-gray-900">Workarea Number</label>
                                            <div class="mt-2">
                                                <input wire:model="workareaNumber" type="text" name="selectedWorkarea-number" id="selectedWorkarea-number" autocomplete="selectedWorkarea-number"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="col-span-full">
                                            <label for="selectedWorkarea-name" class="block text-sm font-medium leading-6 text-gray-900">Workarea Name</label>
                                            <div class="mt-2">
                                                <input wire:model="workareaName" type="text" name="selectedWorkarea-name" id="selectedWorkarea-name" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                    <button wire:click="btnSaveWorkareaModal" type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Save</button>
                                    <button name="btnCancelModal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </template>
    </div>
    <!-- END Workarea Modal -->

    <!-- Workarea Modal -->
    <div x-data="{ open: @entangle('selectedWorkpackage').defer }">
        <template x-if="open">
            <div id="selectedWorkpackageModal" class="{{($selectedWorkpackage?'':'hidden')}} relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                <div class=" fixed inset-0 z-10 overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        @if($selectedWorkpackage)
                            <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                                <div>
                                    <div class="mt-3 text-center sm:mt-5">
                                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Edit Workpackage</h3>
                                    </div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="col-span-full">
                                            <label for="selectedWorkpackage-id" class="block text-sm font-medium leading-6 text-gray-900">Workpackage ID</label>
                                            <div class="mt-2">
                                                <input disabled type="text" name="selectedWorkpackage-id" id="selectedWorkpackage-id" autocomplete="selectedWorkpackage-number" value="{{$selectedWorkpackage->id}}" class="cursor-not-allowed disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="col-span-full">
                                            <label for="selectedWorkpackage-number" class="block text-sm font-medium leading-6 text-gray-900">Workpackage Number</label>
                                            <div class="mt-2">
                                                <input wire:model="workpackageNumber" type="text" name="selectedWorkpackage-number" id="selectedWorkpackage-number" autocomplete="selectedWorkpackage-number"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-left sm:mt-5">
                                        <div class="col-span-full">
                                            <label for="selectedWorkpackage-name" class="block text-sm font-medium leading-6 text-gray-900">Workpackage Name</label>
                                            <div class="mt-2">
                                                <input wire:model="workpackageName" type="text" name="selectedWorkpackage-name" id="selectedWorkpackage-name" autocomplete="selectedWorkpackage-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                                    <button wire:click="btnSaveWorkpackageModal" type="button" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">Save</button>
                                    <button name="btnCancelModal" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </template>
    </div>
    <!-- END Workarea Modal -->
</div>


<script type="module">
    $(document).ready(function() {

        $(document).on('click', 'button[name="btnCancelModal"]', function() {
            $('#selectedWorkareaModal').addClass('hidden');
            $('#selectedWorkpackageModal').addClass('hidden');
        });
        $(document).on('click', 'button[name="btnCancelModal"]', function() {
            $('#selectedWorkareaModal').addClass('hidden');
            $('#selectedWorkpackageModal').addClass('hidden');
        });
    });
    /*
        $(document).on('openQuickEditModal', function(event) {

            //alert(event.detail.workarea.id);
            $('#dialog-modal').removeClass('hidden');
            console.log(event.detail.workarea.id);
            $('#testrr').show().addClass('modal-open');

        });



        */
</script>
