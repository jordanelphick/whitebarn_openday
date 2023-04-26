@props([
    'bgColour' => null,
])


    <tr class="{{(isset($bgColour)? $bgColour:'')}} hover:bg-indigo-100">
        {{ $slot}}
    </tr>



