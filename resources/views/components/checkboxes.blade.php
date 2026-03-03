@php
    $errorName = str_ends_with($name, '[]') ? substr($name, 0, -2) : $name;
    $inputName = str_ends_with($name, '[]') ? $name : $name.'[]';
    $selectedValues = old($errorName, $values);

    if (! is_array($selectedValues)) {
        $selectedValues = $selectedValues === null || $selectedValues === ''
            ? []
            : [$selectedValues];
    }

    $selectedValues = array_map(static fn ($selectedValue) => (string) $selectedValue, $selectedValues);
@endphp

<div>
    <div class="font-semibold text-sm">{{$label}}</div>

    <div class="mt-1 {{ $inline ? 'flex flex-wrap gap-4' : 'space-y-1' }}">
        @foreach($options as $optionValue => $optionLabel)
            @php
                $id = $errorName.'_'.$loop->index;
                $checked = in_array((string) $optionValue, $selectedValues, true);
            @endphp

            <label for="{{$id}}" class="{{ $inline ? 'inline-flex' : 'flex' }} items-center gap-2">
                <input
                    type="checkbox"
                    id="{{$id}}"
                    name="{{$inputName}}"
                    value="{{$optionValue}}"
                    @checked($checked)
                    class="@error($errorName) border-red-600 @else border-sky-700 @enderror"
                >
                <span>{!! $optionLabel !!}</span>
            </label>
        @endforeach
    </div>

    @error($errorName)<div class="text-red-600 text-xs">{{$message}}</div>@enderror
</div>
