
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


    <div>
        <div class="flex-1 max-w-7xl mx-auto py-2 px-4 mb-4">
            <!-- Page title & actions -->
            <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="min-w-0 flex-1">
                    <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Projects</h1>
                </div>
                <div class="mt-4 mb-2 flex sm:ml-4 sm:mt-0">
                    <button type="button" class="sm:order-0 order-1 ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:ml-0">Share</button>
                    <button  type="button" class="order-0 inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600 sm:order-1 sm:ml-3">Create</button>
                </div>
            </div>
        </div>
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
                            <x-table-cell>{{ ($project->status==""?"-":ucwords($project->status)) }}</x-table-cell>
                            <x-table-cell>{{ ($project->updated_at==null?"-":Carbon\Carbon::parse($project->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell><a href="{{ route('dashboard', $project->number) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>

    </div>
