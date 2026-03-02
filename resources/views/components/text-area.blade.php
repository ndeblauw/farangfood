<div>
    <label for="{{$name}}" class="font-semibold text-sm">{{$label}}</label><br/>
    <textarea
        id="{{$name}}"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        class="p-1 border w-2/3 @error($name) border-red-600 @else border-sky-700 @enderror"
        rows="5"
    >{{old($name,$value)}}</textarea>
    @error($name)<div class="text-red-600 text-xs">{{$message}}</div>@enderror
</div>
