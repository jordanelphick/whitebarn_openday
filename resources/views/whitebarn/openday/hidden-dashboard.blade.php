
<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('hidden-dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Hidden Dashboard') }}</a>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>


<div class="">
    <div class="flex-1 max-w-7xl mx-auto py-2 px-4 mb-4">
        <!-- Page title & actions -->
        <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Suzie's Hidden Dashboard</h1>
            </div>
            <div class="min-w-0 flex-1">
                <h2 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Total Confirmed Attending: {{$total_attending}} </h2>
            </div>
        </div>
    </div>
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-table class="p-4">
            <x-slot name="head">
                <x-table-heading sortable wire:click="sortBy('name')" :direction="$sortField ==='name' ? $sortDirection : null">NAME</x-table-heading>
                <x-table-heading sortable wire:click="sortBy('partner_name')" :direction="$sortField ==='partner_name' ? $sortDirection : null">PARTNERS NAME</x-table-heading>
                <x-table-heading sortable wire:click="sortBy('email')" :direction="$sortField ==='email' ? $sortDirection : null">EMAIL</x-table-heading>
                <x-table-heading sortable wire:click="sortBy('mobile')" :direction="$sortField ==='mobile' ? $sortDirection : null">MOBILE</x-table-heading>
                <x-table-heading sortable wire:click="sortBy('attending')" :direction="$sortField ==='attending' ? $sortDirection : null">ATTENDING</x-table-heading>
                <x-table-heading sortable wire:click="sortBy('open_day_ticket_qty')" :direction="$sortField ==='open_day_ticket_qty' ? $sortDirection : null">QTY</x-table-heading>

            </x-slot>
            <x-slot name="body">
                @foreach($users as $user)
                    <x-table-row>
                        <x-table-cell fontWeight="font-semibold">{{ $user->name }}</x-table-cell>
                        <x-table-cell>{{ $user->partner_name }}</x-table-cell>
                        <x-table-cell>{{ $user->email }}</x-table-cell>
                        <x-table-cell>{{ $user->mobile }}</x-table-cell>
                        <x-table-cell>{{ $user->attending }}</x-table-cell>
                        <x-table-cell>{{ $user->open_day_ticket_qty }}</x-table-cell>

                    </x-table-row>
                @endforeach
            </x-slot>
        </x-table>
    </div>

</div>
