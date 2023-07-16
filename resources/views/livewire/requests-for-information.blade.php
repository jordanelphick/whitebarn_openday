<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('dashboard', $project->number) }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __($project->number)}} {{ __($project->name) }}</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{ route('requests-for-information', $project->number) }}#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Requests For Information') }}</a>
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
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Requests For Information</h1>
            </div>
            <div class="mt-4 mb-2 flex sm:ml-4 sm:mt-0">
                <button type="button" class="sm:order-0 order-1 ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:ml-0">Share</button>
                <button wire:click="createRequestForInformation()" type="button" class="order-0 inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600 sm:order-1 sm:ml-3">Create</button>
            </div>
        </div>
    </div>
    @if($project->hasAnyRfis())

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-table>
                <x-slot name="head">
                    <x-table-heading>Number</x-table-heading>
                    <x-table-heading>Name</x-table-heading>
                    <x-table-heading>Work Package</x-table-heading>

                    <x-table-heading>Status</x-table-heading>
                    <x-table-heading>To Action</x-table-heading>
                    <x-table-heading>Created By</x-table-heading>
                    <x-table-heading>Date Created</x-table-heading>
                    <x-table-heading></x-table-heading>
                </x-slot>
                <x-slot name="body">

                    @foreach($project->rfis() as $rfi)
                            <x-table-row>
                                <x-table-cell fontWeight="font-semibold">{{ $rfi->number }}</x-table-cell>
                                <x-table-cell>{{ $rfi->name }}</x-table-cell>
                                <x-table-cell>{{ $rfi->workpackage->name }}</x-table-cell>

                                <x-table-cell>
                                    <div class="flex items-center">
                                        @if($rfi->status=='open')
                                            <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M14.5 1A4.5 4.5 0 0010 5.5V9H3a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-1.5V5.5a3 3 0 116 0v2.75a.75.75 0 001.5 0V5.5A4.5 4.5 0 0014.5 1z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm pl-2 font-medium text-green-700">Open</span>
                                        @else
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm pl-2 font-medium text-gray-700">Closed</span>
                                        @endif
                                    </div>
                                </x-table-cell>
                                <x-table-cell>
                                    {{ $rfi->next_update_organisation->name }}
                                </x-table-cell>
                                <x-table-cell>
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $rfi->created_by->profile_photo_url }}" alt="{{ $rfi->created_by->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $rfi->created_by->name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif

                                </x-table-cell>
                                <x-table-cell>{{  Carbon\Carbon::parse($rfi->created_at)->diffForHumans()}}</x-table-cell>
                                <x-table-cell><a href="{{ route('request-for-information', ['projectNumber'=>$project->number,'rfiNumber'=>$rfi->number]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                            </x-table-row>
                    @endforeach
                </x-slot>
            </x-table>
        </div>
    @else
        <x-empty-state-simple symbol="requests for information" wireClick="createRequestForInformation" heading="No Requests for Information" subHeading="Get started by creating a new RFI" buttonText="New RFI"></x-empty-state-simple>
    @endif
    <!-- RFI MODALS -->


    @include('cRfi/quick-edit-rfi-modal')
</div>
