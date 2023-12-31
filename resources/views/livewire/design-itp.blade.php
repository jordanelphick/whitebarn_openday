<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('dashboard', $project->number) }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('design-itp', $project->number) }}#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Design ITP') }}</a>
                </div>
            </li>

        </ol>
    </nav>
</x-slot>

<div>
    <div class="flex-1 max-w-7xl mx-auto py-2 px-4 mb-4">
        <!-- Page title & actions -->
        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Design ITP</h1>
            </div>
            <div class="mt-4 mb-2 flex sm:ml-4 sm:mt-0">
                <x-button-with-leading-plus-circle wire:click="createWorkarea">Work Area</x-button-with-leading-plus-circle>
                <x-button-with-leading-plus-circle wire:click="createWorkpackage" class="ml-4">Work Package</x-button-with-leading-plus-circle>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-table>
            <x-slot name="head">
                <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">WORK AREA</x-table-heading>
                <x-table-heading wire:click="sortBy('phase')" :direction="$sortField ==='status' ? $sortDirection : null">ACTIVE PHASE</x-table-heading>
                <x-table-heading wire:click="sortBy('checks')" :direction="$sortField ==='status' ? $sortDirection : null">CHECKS</x-table-heading>
                <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">RECORDS</x-table-heading>
                <x-table-heading wire:click="sortBy('open_rfis')" :direction="$sortField ==='open_rfis' ? $sortDirection : null">RFIs</x-table-heading>
                <x-table-heading wire:click="sortBy('accountable_id')" :direction="$sortField ==='open_records' ? $sortDirection : null">Accountable</x-table-heading>
                <!--<x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">UPDATED AT</x-table-heading>-->
                <x-table-heading>Controls</x-table-heading>
                <x-table-heading>Edit</x-table-heading>
            </x-slot>
            <x-slot name="body">
                @foreach($project->workareas as $workarea)
                    <x-table-row bgColour="bg-zinc-200">
                        <x-table-cell fontWeight="font-semibold">{{ $workarea->number . $workarea->number_suffix . ". " . $workarea->name }}</x-table-cell>
                        <x-table-cell>{{ ($workarea->status==""?"":ucwords($workarea->status)) }}</x-table-cell>
                        <x-table-cell><!-- CHECKS --></x-table-cell>
                        <x-table-cell></x-table-cell>
                        <x-table-cell></x-table-cell>
                        <x-table-cell></x-table-cell>
                        <!--<x-table-cell>{{ ($workarea->updated_at==null?"":Carbon\Carbon::parse($workarea->updated_at)->diffForHumans()) }}</x-table-cell>-->
                        <x-table-cell>
                            <div class="flex">
                                <div class="w-1/3">
                                    <x-arrow-short-up wire:click="moveWorkarea({{ $workarea->id }}, -1)"></x-arrow-short-up>
                                    <x-arrow-short-down wire:click="moveWorkarea({{ $workarea->id }}, +1)"></x-arrow-short-down>
                                </div>
                                <div class="w-1/3">
                                    <x-button-pencil wire:click="showQuickEditWorkareaModal({{ $workarea->id }})" class="mt-1.5"></x-button-pencil>
                                </div>
                                <div class="w-1/3">
                                    <x-button-trash wire:click="showDeleteWorkareaModal({{ $workarea->id }})" class="mt-1.5"></x-button-trash>
                                </div>
                            </div>
                        </x-table-cell>

                        <x-table-cell>

                        </x-table-cell>
                    </x-table-row>

                    @foreach($workarea->workpackages as $workpackage)
                        <x-table-row>
                            @php($userIsAccountablePerson = ($workpackage->user->id = Auth::id()?'true':'false'))
                            @php($checkCount = count($workpackage->checks->where('status','=', 'open')))
                            @php($recordCount = count($workpackage->records->where('status','=', 'open')))
                            @php($rfiCount = count($workpackage->rfis->where('status','=', 'open')))

                            <x-table-cell>{{ $workarea->number . $workarea->number_suffix . "." . $workpackage->number . ". " . $workpackage->name }}</x-table-cell>
                            <x-table-cell>
                                <!-- ACTIVE PHSAE -->
                            </x-table-cell>
                            <x-table-cell>
                                @if($checkCount)
                                    <x-pill-with-border colour="red">{{$checkCount}} Checks</x-pill-with-border>
                                @endif
                            </x-table-cell>
                            <x-table-cell>
                                @if($recordCount)
                                    <x-pill-with-border colour="red">{{$recordCount}} Rrecords</x-pill-with-border>
                                @endif
                            </x-table-cell>
                            <x-table-cell>
                                @if($rfiCount)
                                    <x-pill-with-border wire:click="showRfiSummaryModal({{ $workpackage->id }})" colour="red">{{$rfiCount}} RFIs</x-pill-with-border>
                                @endif
                            </x-table-cell>


                            <x-table-cell>

                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ $workpackage->user->profile_photo_url }}" alt="{{ $workpackage->user->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                @endif


                            </x-table-cell>


                            <!--<x-table-cell>{{ ($workpackage->updated_at==null?"":Carbon\Carbon::parse($workpackage->updated_at)->diffForHumans()) }}</x-table-cell>-->

                            <x-table-cell>
                                <div class="flex">
                                    <div class="w-1/3">
                                        <x-arrow-short-up wire:click="moveWorkpackage({{ $workpackage->id }}, -1)"></x-arrow-short-up>
                                        <x-arrow-short-down wire:click="moveWorkpackage({{ $workpackage->id }}, +1)"></x-arrow-short-down>
                                    </div>
                                    <div class="w-1/3">
                                        <x-button-pencil wire:click="showQuickEditWorkpackageModal({{ $workpackage->id }})" class="mt-1.5"></x-button-pencil>
                                    </div>
                                    <div class="w-1/3">
                                        <x-button-trash wire:click="showDeleteWorkpackageModal({{ $workpackage->id }})" class="mt-1.5"></x-button-trash>
                                    </div>
                                </div>
                            </x-table-cell>
                            <x-table-cell><a href="{{ route('workpackage', ['projectNumber'=>$project->number,'workareaName'=>str_replace(" ", "_", $workarea->name),'workpackageName'=>str_replace(" ", "_", $workpackage->name)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>


                    @endforeach
                @endforeach
            </x-slot>
        </x-table>
    </div>




    <!-- WORKAREA MODALS -->
    @include('cProject/quick-edit-workarea-modal')
    @include('cProject/delete-workarea-modal')

    <!-- WORKPACKAGE MODALS -->
    @include('cProject/quick-edit-workpackage-modal')
    @include('cProject/delete-workpackage-modal')

    @include('cProject/rfi-summary-modal')


</div>


<script type="module">
    /*
    $(document).ready(function() {


        $(document).on('click', 'button[name="btnCancelModal"]', function() {
            $('#quickEditWorkareaModal').addClass('hidden');
            $('#selectedWorkpackageModal').addClass('hidden');
            $('#deleteWorkareaModal').addClass('hidden');
        });

    }); */
    /*
        $(document).on('openQuickEditModal', function(event) {

            //alert(event.detail.workarea.id);
            $('#dialog-modal').removeClass('hidden');
            console.log(event.detail.workarea.id);
            $('#testrr').show().addClass('modal-open');

        });



        */
</script>
