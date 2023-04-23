<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('projects') }}">{{ __('Projects') }}</a> >
            <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{ route('project', $project->number) }}">{{ __($project->number)}} {{ __($project->name) }}</a>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="align-middle min-w-full overflow-x-auto shadow overflow-hiden sm-rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs  uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <span class=" text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
                                Work Area
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class=" text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
                                Status
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class=" text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
                                Open Records
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class=" text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
                                Last Updated
                            </span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class=" text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Edit</span>
                            </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($project->workareas as $workarea)
                            <tr class="g-neutral-100 border-b">
                                <td class="px-6 py-4 font-black text-gray-700 whitespace-nowrap">
                                    {{ $workarea->number }}. {{ strtoupper($workarea->name) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ ($workarea->status==""?"-":ucwords($workarea->status)) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ count($workarea->records->where('status','=', 'open')) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ ($workarea->updated_at==null?"-":Carbon\Carbon::parse($project->updated_at)->diffForHumans()) }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('workarea', ['project'=>$project->number, 'workarea'=>str_replace(' ', '_', strtolower($workarea->name))]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            @foreach($workarea->workpackages as $workpackage)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 font-light text-gray-700 whitespace-nowrap">
                                        {{ $workarea->number }}.{{ $workpackage->number }} {{ $workpackage->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ ($workpackage->status==""?"-":ucwords($workpackage->status)) }}
                                    </td>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4">

                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>

