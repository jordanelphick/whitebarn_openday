@props([
    'bgColour' => null,
])

@if (isset($bgColour))
    <tr class="{{$bgColour}}">
        {{ $slot}}
    </tr>
@else
    <tr>
        {{ $slot}}
    </tr>
@endif


