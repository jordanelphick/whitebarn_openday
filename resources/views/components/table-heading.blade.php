@props([
    'sortable' => null,
    'direction' => null
])

<th
    {{ $attributes->merge(['class'=>'px-4 py-3.5 pl-4 pr-3 text-left text-sm leading-4 font-semibold text-gray-900 sm:pl-2'])->only('class') }}
>

    @unless($sortable)
        <span class="text-left text-xs pl-1 leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">{{ $slot }}</span>

    @else
        <button {{ $attributes->except('class') }} class="flex pl-1 items-center space-x-1 text-left text-xs leading-4 font-medium text-cool-gray-500">

            <span>{{ $slot }}</span>
            <span>
                @if ($direction === 'asc')
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>


                @elseif($direction === 'desc')
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                @endif
            </span>
        </button>

    @endif
</th>
