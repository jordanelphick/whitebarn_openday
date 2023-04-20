<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($project->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs  uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Work Area
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
                        @foreach($project->workareas as $workarea)
                            <tr class="bg-neutral-100 border-b tr-workarea">
                                <th scope="row" class="px-6 py-4 font-black text-gray-700 whitespace-nowrap">
                                    {{ $workarea->number }}. {{ strtoupper($workarea->name) }}
                                </th>
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
                                    <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            @foreach($workarea->workpackages as $workpackage)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-light text-gray-700 whitespace-nowrap">
                                        {{ $workarea->number }}.{{ $workpackage->number }} {{ $workpackage->name }}
                                    </th>
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


<script>
document.getElementByC("your_div").style.display = "none";
</script>