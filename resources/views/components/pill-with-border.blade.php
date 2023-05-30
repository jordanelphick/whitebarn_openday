

<button {{$attributes->merge(['class'=>'text-gray-500 font-bold px-2 rounded inline-flex items-center'])}}">
    <span class='inline-flex items-center rounded-full bg-{{$colour}}-100 px-2 py-1 text-xs font-medium text-{{$colour}}-700'>{{$slot}}</span>
</button>
