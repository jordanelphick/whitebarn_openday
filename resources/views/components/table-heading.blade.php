@props([
    'sortable' => null,
    'direction' => null,
])

<th class="px-6 py-3">

	<span class=" text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider"> {{ $slot }} </span>
</th>