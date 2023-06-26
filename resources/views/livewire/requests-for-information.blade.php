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




<div class="py-4">
    @if($project->hasAnyRfis())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 flex justify-end">
            <x-button-with-leading-plus-circle wire:click="createRequestForInformation()" >Request for Information</x-button-with-leading-plus-circle>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-table>
                <x-slot name="head">
                    <x-table-heading>Number</x-table-heading>
                    <x-table-heading>Name</x-table-heading>
                    <x-table-heading>Work Package</x-table-heading>
                    <x-table-heading>Status</x-table-heading>
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
                                    <x-flat-pill-with-leading-icon>{{$rfi->status}}</x-flat-pill-with-leading-icon>
                                </x-table-cell>
                                <x-table-cell>
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ $rfi->user->profile_photo_url }}" alt="{{ $rfi->user->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $rfi->user->name }}

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
