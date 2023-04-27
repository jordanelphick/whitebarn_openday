
    <x-slot name="header">
        <nav class="hidden sm:flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex">
                        <a href="{{ route('projects') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Projects') }}</a>
                    </div>
                </li>
            </ol>
        </nav>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table>
                <x-slot name="head">
                    <x-table-heading sortable wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">PROJECT</x-table-heading>
                    <x-table-heading sortable wire:click="sortBy('status')" :direction="$sortField ==='status' ? $sortDirection : null">STATUS</x-table-heading>
                    <x-table-heading sortable wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">UPDATED AT</x-table-heading>
                    <x-table-heading><span class="sr-only">Edit</span></x-table-heading>
                </x-slot>
                <x-slot name="body">
                    @foreach($projects as $project)
                        <x-table-row>
                            <x-table-cell fontWeight="font-semibold">{{ $project->number }} - {{ $project->name }}</x-table-cell>

                            <x-table-cell>
                                @if($project->status=="")
                                @else
                                    <x-badge-pill colour="{{$project->getStatusColour()}}" >{{ucwords($project->status)}}</x-badge-pill>
                                @endif
                            </x-table-cell>

                            <x-table-cell>{{ ($project->updated_at==null?"":Carbon\Carbon::parse($project->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell><a href="{{ route('project', $project->number) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>

    </div>
