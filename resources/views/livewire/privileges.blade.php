
<x-slot name="header">
    <nav class="hidden sm:flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div class="flex">
                    <a href="{{ route('privileges') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Privileges') }}</a>
                </div>
            </li>
        </ol>
    </nav>
</x-slot>


<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-4 flex justify-end">
        <x-button-with-leading-plus-circle >Work Area</x-button-with-leading-plus-circle>
        <x-button-with-leading-plus-circle class="ml-4">Work Package</x-button-with-leading-plus-circle>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-table>
            <x-slot name="head">
                <x-table-heading>User</x-table-heading>

                <x-table-heading>Create</x-table-heading>
                <x-table-heading>Read</x-table-heading>
                <x-table-heading>Update</x-table-heading>
                <x-table-heading>Delete</x-table-heading>
            </x-slot>
            <x-slot name="body">
                @foreach(App\Models\User::all() as $user)
                    <x-table-row bgColour="bg-zinc-200">
                        <x-table-cell fontWeight="font-semibold">{{ $user->name }}</x-table-cell>

                        <x-table-cell></x-table-cell>
                        <x-table-cell></x-table-cell>
                        <x-table-cell></x-table-cell>
                        <x-table-cell></x-table-cell>
                    </x-table-row>
                    @foreach(App\Models\Privilege::orderby('name','asc')->get() as $privilege)
                        <x-table-row>

                            <x-table-cell>{{ ucwords($privilege->name) }}</x-table-cell>
                            <x-table-cell>
                                @if($user->privileges->contains(function ($item) use ($privilege) {
                                      return $item->id === $privilege->id && $item->pivot->create === 1;
                                  }))
                                    <x-heroicons.check-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'create', 0)"></x-heroicons.check-circle>
                                @else
                                    <x-heroicons.x-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'create', 1)"></x-heroicons.x-circle>
                                @endif
                            </x-table-cell>
                            <x-table-cell>
                                @if($user->privileges->contains(function ($item) use ($privilege) {
                                      return $item->id === $privilege->id && $item->pivot->read === 1;
                                  }))
                                    <x-heroicons.check-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'read', 0)"></x-heroicons.check-circle>
                                @else
                                    <x-heroicons.x-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'read', 1)"></x-heroicons.x-circle>
                                @endif
                            </x-table-cell>
                            <x-table-cell>
                                @if($user->privileges->contains(function ($item) use ($privilege) {
                                      return $item->id === $privilege->id && $item->pivot->update === 1;
                                  }))
                                    <x-heroicons.check-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'update', 0)"></x-heroicons.check-circle>
                                @else
                                    <x-heroicons.x-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'update', 1)"></x-heroicons.x-circle>
                                @endif
                            </x-table-cell>
                            <x-table-cell>
                                @if($user->privileges->contains(function ($item) use ($privilege) {
                                      return $item->id === $privilege->id && $item->pivot->delete === 1;
                                  }))
                                    <x-heroicons.check-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'delete', 0)"></x-heroicons.check-circle>
                                @else
                                    <x-heroicons.x-circle wire:click="editPrivilege({{ $privilege->id }},{{ $user->id }},'delete', 1)"></x-heroicons.x-circle>
                                @endif
                            </x-table-cell>
                    </x-table-row>
                    @endforeach
                @endforeach
            </x-slot>
        </x-table>
    </div>



</div>
