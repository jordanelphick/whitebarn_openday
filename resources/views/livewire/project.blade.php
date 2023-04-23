<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Project') }} > {{ $project->number . " - " .  $project->name}}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-table>
            <x-slot name="head">
                <x-table-heading wire:click="sortBy('number')" :direction="$sortField ==='number' ? $sortDirection : null">WORK AREA</x-table-heading>
                <x-table-heading wire:click="sortBy('status')" :direction="$sortField ==='status' ? $sortDirection : null">STATUS</x-table-heading>
                <x-table-heading wire:click="sortBy('open_records')" :direction="$sortField ==='open_records' ? $sortDirection : null">OPEN RECORDS</x-table-heading>
                <x-table-heading wire:click="sortBy('updated_at')" :direction="$sortField ==='updated_at' ? $sortDirection : null">UPDATED AT</x-table-heading>
                <x-table-heading><span class="sr-only">Edit</span></x-table-heading>
            </x-slot>
            <x-slot name="body">
                @foreach($project->workareas as $workarea)
                    <x-table-row bgColour="bg-zinc-50">
                        <x-table-cell fontWeight="font-bold">{{ $workarea->number . ". " . $workarea->name }}</x-table-cell>
                        <x-table-cell>{{ ($workarea->status==""?"-":ucwords($workarea->status)) }}</x-table-cell>
                        <x-table-cell>{{ count($workarea->records->where('status','=', 'open')) }}</x-table-cell>
                        <x-table-cell>{{ ($workarea->updated_at==null?"-":Carbon\Carbon::parse($workarea->updated_at)->diffForHumans()) }}</x-table-cell>
                        <x-table-cell><a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                    </x-table-row>

                    @foreach($workarea->workpackages as $workpackage)
                        <x-table-row>
                            <x-table-cell>{{ $workarea->number . "." . $workpackage->number . ". " . $workpackage->name }}</x-table-cell>
                            <x-table-cell>{{ ($workpackage->status==""?"-":ucwords($workpackage->status)) }}</x-table-cell>
                            <x-table-cell></x-table-cell>
                            <x-table-cell>{{ ($workpackage->updated_at==null?"-":Carbon\Carbon::parse($workpackage->updated_at)->diffForHumans()) }}</x-table-cell>
                            <x-table-cell><a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a></x-table-cell>
                        </x-table-row>
                    @endforeach
                @endforeach
            </x-slot>
        </x-table>
    </div>

</div>
