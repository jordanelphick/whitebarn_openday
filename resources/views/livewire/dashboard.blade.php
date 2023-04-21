    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table>
                <x-slot name="head">
                    <x-table-heading>Project</x-table-heading>
                    <x-table-heading>Status</x-table-heading>
                    <x-table-heading>Open Records</x-table-heading>
                    <x-table-heading>Last Update</x-table-heading>
                    <x-table-heading><span class="sr-only">Edit</span></x-table-heading>
                </x-slot>
                <x-slot name="body">
                    @foreach($projects as $project)
                        <x-table-row>
                            <x-table-cell>{{ $project->number }} - {{ $project->name }}</x-table-cell>
                            <x-table-cell>{{ ($project->status==""?"-":ucwords($project->status)) }}</x-table-cell>
                            <x-table-cell>{{ count($project->records->where('status','=', 'open')) }}</x-table-cell>
                            <x-table-cell>{{ ($project->updated_at==null?"-":Carbon\Carbon::parse($project->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell><a href="{{ route('project', $project->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>

    </div>
