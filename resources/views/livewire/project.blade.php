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
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-table>
            <x-slot name="head">
                <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">WORK AREA</x-table-heading>
                <x-table-heading wire:click="sortBy('status')" :direction="$sortField ==='status' ? $sortDirection : null">STATUS</x-table-heading>
                <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">OPEN RECORDS</x-table-heading>
                <x-table-heading wire:click="sortBy('accountable_id')" :direction="$sortField ==='open_records' ? $sortDirection : null">Accountable</x-table-heading>
                <x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">UPDATED AT</x-table-heading>
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
                        <x-table-cell>{{ ($workarea->updated_at==null?"":Carbon\Carbon::parse($workarea->updated_at)->diffForHumans()) }}</x-table-cell>
                        <x-table-cell>
                            <x-button-pencil wire:click="edit">TEST MODAL</x-button-pencil>
                        </x-table-cell>
                        <x-table-cell>
                            <div>
                                <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                                <select id="location" name="location" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option>United States</option>
                                    <option selected>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>

                        </x-table-cell>
                    </x-table-row>

                    @foreach($workarea->workpackages as $workpackage)
                        <x-table-row>
                            <x-table-cell>{{ $workarea->number . "." . $workpackage->number . ". " . $workpackage->name }}</x-table-cell>
                            <x-table-cell>
                                @if($workpackage->status=="")
                                @else
                                    <x-badge-pill>{{ucwords($workpackage->status)}}</x-badge-pill>
                                @endif
                            </x-table-cell>

                            <x-table-cell>{{ count($workpackage->records->where('status','=', 'open')) }}</x-table-cell>
                            <x-table-cell>{{ $workpackage->user->initials() }}</x-table-cell>
                            <x-table-cell>{{ ($workpackage->updated_at==null?"":Carbon\Carbon::parse($workpackage->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell></x-table-cell>
                            <x-table-cell><a href="{{ route('workpackage', ['projectNumber'=>$project->number,'workareaName'=>str_replace(" ", "_", $workarea->name),'workpackageName'=>str_replace(" ", "_", $workpackage->name)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>
                    @endforeach
                @endforeach
            </x-slot>
        </x-table>
    </div>

    <x-dialog-modal wire:model="showEditModal">
        <x-slot name="title">Work Package Details</x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-gray-900/10 pb-12 md:grid-cols-3">


                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-8">
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

        </x-slot>
        <x-slot name="footer">
            <x-button>Cancel</x-button>
            <x-button>Save</x-button>
        </x-slot>
    </x-dialog-modal>


</div>

<script type="module">

    $('.btn-dropdown').hover(

        function () {
            var id = $(this).data('menu-id');
            $('#' + id).removeClass('hidden');
        },

        function () {
            var id = $(this).data('menu-id');
            $('#' + id).addClass('hidden');
        }
    );


    // Add click event listeners to all tabs
    $('.tbl-dropdown').each(function(index, activeTab) {

        $(activeTab).on( "hover", function(event) {

            event.preventDefault();
            alert('hey');

        });
    });

</script>
