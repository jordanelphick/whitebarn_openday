
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

            <div class="space-y-12 py-5">

                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Records</h2>

                </div>
                <div>
                    <div class="hidden sm:block">
                        <nav class="flex space-x-4" aria-label="Tabs">
                            <a href="#" class="bg-indigo-100 text-indigo-700 text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" aria-current="page" data-tab="my-account" data-tab-content="my-account-content">Open ({{count($workpackage->records->where('status','open'))}})</a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" data-tab="company" data-tab-content="company-content">Closed ({{count($workpackage->records->where('status','closed'))}})</a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" data-tab="team-members" data-tab-content="team-members-content">All ({{count($workpackage->records)}})</a>
                            <a href="#" class="text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" data-tab="billing" data-tab-content="billing-content">Billing</a>
                        </nav>
                    </div>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <div id="my-account-content" class="tab-pane">

                            <div class="border-t border-white/10">

                                <table class="mt-6 w-full text-left table-auto">
                                    <colgroup>
                                        <col class="w-full sm:w-4/12">
                                        <col class="lg:w-4/12">
                                        <col class="lg:w-2/12">
                                        <col class="lg:w-1/12">
                                        <col class="lg:w-1/12">
                                    </colgroup>
                                    <thead class="border-b border-white/10 text-sm leading-6 text-gray-800">
                                    <tr>
                                        <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Record</th>
                                        <th scope="col" class="hidden py-2 pl-0 pr-8 font-semibold sm:table-cell">Comment</th>
                                        <th scope="col" class="py-2 pl-0 pr-4 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20">Status</th>
                                        <th scope="col" class="hidden py-2 pl-0 pr-8 font-semibold md:table-cell lg:pr-20">Duration</th>
                                        <th scope="col" class="hidden py-2 pl-0 pr-4 text-right font-semibold sm:table-cell sm:pr-6 lg:pr-8">Date Reviewed</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-white/5">
                                        @foreach($workpackage->records->where('status', 'open') as $record)
                                            <tr>
                                                <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                                                    <div class="flex items-center gap-x-4">
                                                        
                                                        <div class="truncate text-sm font-medium leading-6 text-gray-800 break-words">{{ $record->comment}}</div>
                                                    </div>
                                                </td>
                                                <td class="hidden py-4 pl-0 pr-4 sm:table-cell sm:pr-8">
                                                    <div class="flex gap-x-3">
                                                        <div class="font-mono text-sm leading-6 text-gray-400">{{ $record->document_number}}</div>
                                                        <span class="inline-flex items-center rounded-md bg-gray-400/10 px-2 py-1 text-xs font-medium text-gray-400 ring-1 ring-inset ring-gray-400/20">{{ $record->document_revision}}</span>
                                                    </div>
                                                </td>
                                                <td class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                                                    <div class="flex items-center justify-end gap-x-2 sm:justify-start">
                                                        <time class="text-gray-400 sm:hidden" datetime="2023-01-23T11:00">45 minutes ago</time>
                                                        <div class="flex-none rounded-full p-1 text-green-400 bg-green-400/10">
                                                            <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                                                        </div>
                                                        <div class="hidden text-gray-800 sm:block">{{$record->status}}</div>
                                                    </div>
                                                </td>
                                                <td class="hidden py-4 pl-0 pr-8 text-sm leading-6 text-gray-400 md:table-cell lg:pr-20">{{$record->date_reviewed}}</td>
                                                <td class="hidden py-4 pl-0 pr-4 text-right text-sm leading-6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8">
                                                    <time datetime="2023-01-23T11:00">{{$record->date_reviewed}}</time>
                                                </td>
                                            </tr>
                                        @endforeach
                                    <!-- More items... -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div id="company-content" class="tab-pane hidden">
                            2
                        </div>
                        <div id="team-members-content" class="tab-pane hidden">
                           3
                        </div>
                        <div id="billing-content" class="tab-pane hidden">
                           4
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
