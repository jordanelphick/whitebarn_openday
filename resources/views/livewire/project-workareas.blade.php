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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ $project->name }} - Workareas
                    </h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        @foreach ($project->workareas as $workarea)
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $workarea->name }}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="showEditModal({{ $workarea->id }})">Edit</button>
                                </dd>
                            </div>

                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </div>

<x-dialog-modal wire:model="showEditModal">

</x-dialog-modal>

