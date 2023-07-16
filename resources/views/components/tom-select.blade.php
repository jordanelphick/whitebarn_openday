<div wire:ignore
     x-data
     x-init="() => {
        let options = {};

        options.search = true;
        options.placeholder = 'Seleccione un elemento';
        options.deselect = true;

        if ('{{ $attributes['multiple'] }}' === 'yes') {
            options.descriptions = true;
            options.hideSelected = false;
            options.hideDisabled = false;
            // options.multiLimit = 15;
            options.multiShowCount = false;
            options.multiContainer = true;
        }

        tail($refs.{{ $attributes['wire:model'] }} , options);

        @if($attributes['multiple'] === 'yes')
        $refs.{{ $attributes['wire:model'] }}.addEventListener('change', function(el) {
            let values = [];
            for (var i = 0; i < this.selectedOptions.length; i++) {
                values.push(this.selectedOptions[i].value);
            }
            @this.set('{{ $attributes['wire:model'] }}' , values);
        });
        @else
        $refs.{{ $attributes['wire:model'] }}.addEventListener('change', function(el) {
            @this.set('{{ $attributes['wire:model'] }}' , this.selectedOptions[0].value);
        });
        @endif
    }
    ">
    <select
        id="{{ $attributes['wire:model'] }}"
        x-ref="{{ $attributes['wire:model'] }}"
        @if($attributes['multiple'] === 'yes') multiple="multiple" @endif
    >

        @if(count($attributes['options']) > 0)

            @if(isset($attributes['group']))
                @foreach($attributes['options'] as $optionPadre)
                    <optgroup label="{{$optionPadre['nombre']}}">
                        @foreach($optionPadre[$attributes['group']] as $option)
                            <option value="{{$option['id']}}" @if($attributes['selected'] && in_array($option['id'], $attributes['selected'])) selected @endif >
                                {{$option['nombre']}}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
            @else
                @foreach($attributes['options'] as $key=>$option)
                    <option value="{{$key}}" @if($attributes['selected'] && in_array($key , $attributes['selected'])) selected @endif >
                        {{$option}}
                    </option>
                @endforeach
            @endif

        @endif
    </select>
</div>
