@props([
    'textWrap' => null,
    'fontWeight' => null,
])

<td class="{{($textWrap==true? 'whitespace-nowrap':'')}} px-3 py-4 text-sm {{ $fontWeight }} text-gray-900">
    {{ $slot}}
</td>
