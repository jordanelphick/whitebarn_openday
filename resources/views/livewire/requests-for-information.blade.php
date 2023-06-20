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
                                <x-table-cell>{{ $rfi->user->name }}</x-table-cell>
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
