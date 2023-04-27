@props([
    'colour' => null
])

<span class="inline-flex items-center gap-x-1.5 rounded-full bg-{{$colour}}-100 px-2 py-1 text-xs font-medium text-{{$colour}}-700">
    <svg class="h-1.5 w-1.5 fill-{{$colour}}-500" viewBox="0 0 6 6" aria-hidden="true">
      <circle cx="3" cy="3" r="3" />
    </svg>
    {{ $slot }}
</span>
