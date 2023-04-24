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
                <x-table-heading>TEST</x-table-heading>
                <x-table-heading>Edit<span class="sr-only">Edit</span></x-table-heading>
            </x-slot>
            <x-slot name="body">
                @foreach($project->workareas as $workarea)
                    <x-table-row bgColour="bg-zinc-100">
                        <x-table-cell fontWeight="font-semibold">{{ $workarea->number . ". " . $workarea->name }}</x-table-cell>
                        <x-table-cell>{{ ($workarea->status==""?"-":ucwords($workarea->status)) }}</x-table-cell>
                        <x-table-cell>-</x-table-cell>
                        <x-table-cell>-</x-table-cell>
                        <x-table-cell>{{ ($workarea->updated_at==null?"-":Carbon\Carbon::parse($workarea->updated_at)->diffForHumans()) }}</x-table-cell>
                        <x-table-cell>
                            <x-button wire:click="edit">TEST MODAL</x-button>
                        </x-table-cell>
                        <x-table-cell>
                            <a href="{{ route('workarea', ['projectNumber'=>$project->number,str_replace(" ", "_", $workarea->name)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Add</a> |
                            <a href="{{ route('workarea', ['projectNumber'=>$project->number,str_replace(" ", "_", $workarea->name)]) }}" class="font-medium text-gray-600 dark:text-blue-500 hover:underline">Edit</a> |
                            <a href="{{ route('workarea', ['projectNumber'=>$project->number,str_replace(" ", "_", $workarea->name)]) }}" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                        </x-table-cell>
                    </x-table-row>

                    @foreach($workarea->workpackages as $workpackage)
                        <x-table-row>
                            <x-table-cell>{{ $workarea->number . "." . $workpackage->number . ". " . $workpackage->name }}</x-table-cell>
                            <x-table-cell>{{ ($workpackage->status==""?"-":ucwords($workpackage->status)) }}</x-table-cell>
                            <x-table-cell>{{ count($workpackage->records->where('status','=', 'open')) }}</x-table-cell>
                            <x-table-cell>{{ $workpackage->user->initials() }}</x-table-cell>
                            <x-table-cell>{{ ($workpackage->updated_at==null?"-":Carbon\Carbon::parse($workpackage->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell></x-table-cell>
                            <x-table-cell><a href="{{ route('workpackage', ['projectNumber'=>$project->number,'workareaName'=>str_replace(" ", "_", $workarea->name),'workpackageName'=>str_replace(" ", "_", $workpackage->name)]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>
                    @endforeach
                @endforeach
            </x-slot>
        </x-table>
    </div>

    <x-dialog-modal wire:model="showEditModal">
        <x-slot name="title">title</x-slot>
        <x-slot name="content">
            <input id="test"/>
        </x-slot>
        <x-slot name="footer">
            <x-button>Cancel</x-button>
            <x-button>Save</x-button>
        </x-slot>
    </x-dialog-modal>


</div>

