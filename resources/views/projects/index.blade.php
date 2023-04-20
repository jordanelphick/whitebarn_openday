<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs  uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Project
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Open Records
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Last Updated
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                {{ $project->number }} - {{ $project->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ ($project->status==""?"-":ucwords($project->status)) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ count($project->records->where('status','=', 'open')) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ ($project->updated_at==null?"-":Carbon\Carbon::parse($project->updated_at)->diffForHumans()) }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('project', $project->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
