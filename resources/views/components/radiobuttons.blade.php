<div>
    <div class="font-semibold text-sm">{{$label}}</div>

    <div class="mt-1 {{ $inline ? 'flex flex-wrap gap-4' : 'space-y-1' }}">
        @foreach($options as $optionValue => $optionLabel)
            @php
                $id = $name.'_'.$loop->index;
                $checked = (string) old($name, $value) === (string) $optionValue;
            @endphp

            <label for="{{$id}}" class="{{ $inline ? 'inline-flex' : 'flex' }} items-center gap-2">
                <input
                    type="radio"
                    id="{{$id}}"
                    name="{{$name}}"
                    value="{{$optionValue}}"
                    @checked($checked)
                    class="@error($name) border-red-600 @else border-sky-700 @enderror"
                >
                <span>{!! $optionLabel !!}</span>
            </label>
        @endforeach
    </div>

    @error($name)<div class="text-red-600 text-xs">{{$message}}</div>@enderror
</div>
