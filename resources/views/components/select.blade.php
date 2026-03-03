<div>
    <label for="{{$name}}" class="font-semibold text-sm">{{$label}}</label><br/>

    <select
        id="{{$name}}"
        name="{{$name}}"
        class="p-1 w-2/3 border @error($name) border-red-600 @else border-sky-700 @enderror"
    >
        @if($placeholder)
            <option value="">{{$placeholder}}</option>
        @endif

        @foreach($options as $optionValue => $optionLabel)
            <option
                value="{{$optionValue}}"
                @selected((string) old($name, $value) === (string) $optionValue)
            >
                {{$optionLabel}}
            </option>
        @endforeach
    </select>

    @error($name)<div class="text-red-600 text-xs">{{$message}}</div>@enderror
</div>
