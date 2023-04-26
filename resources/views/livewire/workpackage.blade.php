
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
                    <a href="{{ route('project', $project->number) }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('workarea', ['projectNumber'=>$project->number,'workareaName'=>str_replace(" ", "_", $workarea->name),'workpackageName'=>str_replace(" ", "_", $workpackage->name)]) }}" aria-current="page" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$workarea->number . ". " . $workarea->name}}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="#" aria-current="page" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$workpackage->number . ". " . $workpackage->name}}</a>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form>
            <div class="space-y-12">
                <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3">
                    <div>
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Work Package Details</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Edit the work package details.</p>
                    </div>

                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                        <div class="sm:col-span-3">
                            <label for="workpackage-number" class="block text-sm font-medium leading-6 text-gray-900">Number / Design ITP Ref</label>
                            <div class="mt-2">
                                <input type="text" name="workpackage-number" id="workpackage-number" autocomplete="workpackage-number" value="{{$workpackage->number}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="workpacakge-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input type="text" name="workpacakge-name" id="workpacakge-name" autocomplete="workpacakge-name" value="{{$workpackage->name}}"  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="project" class="block text-sm font-medium leading-6 text-gray-900">Project</label>
                            <div class="mt-2">
                                <select id="project" name="project" autocomplete="project-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach(App\Models\Project::all() as $prj)
                                        <option disabled {{($prj->id===$workarea->project->id?"selected":"")}}>{{$prj->number}} - {{ $prj->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="workarea" class="block text-sm font-medium leading-6 text-gray-900">Work Area</label>
                            <div class="mt-2">
                                <select id="workarea" name="workarea" autocomplete="workarea-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                                    @foreach(App\Models\Workarea::where('project_id','=', $project->id)->get() as $area)
                                        <option {{ ($area->id === $workarea->id? "selected":"") }}>{{$area->number . ". " . $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="accountable" class="block text-sm font-medium leading-6 text-gray-900">Accountable Person</label>
                            <div class="mt-2">
                                <select id="accountable" name="accountable" autocomplete="accountable-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                                    @foreach(App\Models\User::all() as $u)
                                        <option {{ ($u->id === $workpackage->accountable_id ? "selected":"") }}>{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <div class="space-y-5 py-5">

                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Records</h2>

                </div>
                <div>
                    <div class="hidden sm:block">
                        <nav class="flex space-x-4" aria-label="Tabs">
                            <a href="#" class="bg-indigo-100 text-indigo-700 text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" aria-current="page" data-tab="open-records" data-tab-content="open-records-content">Open ({{count($workpackage->records->where('status','open'))}})</a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" data-tab="closed-records" data-tab-content="closed-records-content">Closed ({{count($workpackage->records->where('status','closed'))}})</a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" data-tab="all-records" data-tab-content="all-records-content">All ({{count($workpackage->records)}})</a>
                           </nav>
                    </div>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <div id="open-records-content" class="tab-pane">

                            <div class="border-t border-white/10 py-5">

                                <x-table>
                                    <x-slot name="head">
                                        <x-table-heading wire:click="sortBy('document_number')" :direction="$sortField ==='status' ? $sortDirection : null">DOCUMENT</x-table-heading>
                                        <x-table-heading wire:click="sortBy('document_revision')" :direction="$sortField ==='status' ? $sortDirection : null">REV</x-table-heading>
                                        <x-table-heading wire:click="sortBy('comment')" :direction="$sortField ==='number' ? $sortDirection : null">COMMENT</x-table-heading>
                                        <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">STATUS</x-table-heading>
                                        <x-table-heading wire:click="sortBy('accountable_id')" :direction="$sortField ==='open_records' ? $sortDirection : null">ASSIGNED TO</x-table-heading>
                                        <x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">DATE REVIEWED</x-table-heading>

                                    </x-slot>
                                    <x-slot name="body">
                                        @foreach($workpackage->records->where('status', 'open') as $record)
                                            <x-table-row>
                                                <x-table-cell textWrap="false">{{ $record->document_number }}</x-table-cell>
                                                <x-table-cell>{{ $record->document_revision }}</x-table-cell>
                                                <x-table-cell>{{ $record->comment }}</x-table-cell>
                                                <x-table-cell>{{ $record->status }}</x-table-cell>
                                                <x-table-cell>{{ $record->getUsersInitials() }}</x-table-cell>
                                                <x-table-cell>{{ $record->date_reviewed }}</x-table-cell>
                                            </x-table-row>
                                        @endforeach
                                    </x-slot>
                                </x-table>

                            </div>

                        </div>
                        <div id="closed-records-content" class="tab-pane hidden">
                            <div class="border-t border-white/10 py-5">

                                <x-table>
                                    <x-slot name="head">
                                        <x-table-heading wire:click="sortBy('document_number')" :direction="$sortField ==='status' ? $sortDirection : null">DOCUMENT</x-table-heading>
                                        <x-table-heading wire:click="sortBy('document_revision')" :direction="$sortField ==='status' ? $sortDirection : null">REV</x-table-heading>
                                        <x-table-heading wire:click="sortBy('comment')" :direction="$sortField ==='number' ? $sortDirection : null">COMMENT</x-table-heading>
                                        <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">STATUS</x-table-heading>
                                        <x-table-heading wire:click="sortBy('accountable_id')" :direction="$sortField ==='open_records' ? $sortDirection : null">ASSIGNED TO</x-table-heading>
                                        <x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">DATE REVIEWED</x-table-heading>

                                    </x-slot>
                                    <x-slot name="body">
                                        @foreach($workpackage->records->where('status', 'closed') as $record)
                                            <x-table-row>
                                                <x-table-cell textWrap="false">{{ $record->document_number }}</x-table-cell>
                                                <x-table-cell>{{ $record->document_revision }}</x-table-cell>
                                                <x-table-cell>{{ $record->comment }}</x-table-cell>
                                                <x-table-cell>{{ $record->status }}</x-table-cell>
                                                <x-table-cell>{{ $record->getUsersInitials() }}</x-table-cell>
                                                <x-table-cell>{{ $record->date_reviewed }}</x-table-cell>
                                            </x-table-row>
                                        @endforeach
                                    </x-slot>
                                </x-table>

                            </div>
                        </div>
                        <div id="all-records-content" class="tab-pane hidden">
                            <div class="border-t border-white/10 py-5">

                                <x-table>
                                    <x-slot name="head">
                                        <x-table-heading wire:click="sortBy('document_number')" :direction="$sortField ==='status' ? $sortDirection : null">DOCUMENT</x-table-heading>
                                        <x-table-heading wire:click="sortBy('document_revision')" :direction="$sortField ==='status' ? $sortDirection : null">REV</x-table-heading>
                                        <x-table-heading wire:click="sortBy('comment')" :direction="$sortField ==='number' ? $sortDirection : null">COMMENT</x-table-heading>
                                        <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">STATUS</x-table-heading>
                                        <x-table-heading wire:click="sortBy('accountable_id')" :direction="$sortField ==='open_records' ? $sortDirection : null">ASSIGNED TO</x-table-heading>
                                        <x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">DATE REVIEWED</x-table-heading>

                                    </x-slot>
                                    <x-slot name="body">
                                        @foreach($workpackage->records as $record)
                                            <x-table-row>
                                                <x-table-cell textWrap="false">{{ $record->document_number }}</x-table-cell>
                                                <x-table-cell>{{ $record->document_revision }}</x-table-cell>
                                                <x-table-cell>{{ $record->comment }}</x-table-cell>
                                                <x-table-cell>{{ $record->status }}</x-table-cell>
                                                <x-table-cell>{{ $record->getUsersInitials() }}</x-table-cell>
                                                <x-table-cell>{{ $record->date_reviewed }}</x-table-cell>
                                            </x-table-row>
                                        @endforeach
                                    </x-slot>
                                </x-table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-gray-800 shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </div>
</div>


<script type="module">

    // Hide all tab content except the first tab
    $('.tab-pane').each(function(index, pane) {
        if (index !== 0) {
            $(pane).addClass( "hidden" );
        }
    });



    // Add click event listeners to all tabs
    $('[data-tab]').each(function(index, activeTab) {

        $(activeTab).on( "click", function(event) {

            event.preventDefault();

            // Loop through all tabs, remove the background and text colour
            $('[data-tab]').each(function(index, tab) {
                $(tab).removeClass("bg-indigo-100 text-indigo-700");
            });
            // add the background and text colour only to the active Tab
            $(activeTab).addClass("bg-indigo-100 text-indigo-700");

            // Loop through each tabPane and hide its content
            $('.tab-pane').each(function(index, tabPane) {
                $(tabPane).addClass("hidden");
            });
            // Only show the activeTab's content pane
            var paneId = $(activeTab).data('tab-content')
            $('#'+paneId).removeClass('hidden');

        });
    });


</script>
