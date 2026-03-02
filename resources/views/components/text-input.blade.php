<div>
    <label for="{{$name}}" class="font-semibold text-sm">{{$label}}</label><br/>
    <input type="text" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name,$value)}}" class="p-1 border @error($name) border-red-600 @else border-sky-700 @enderror">
    @error($name)<div class="text-red-600 text-xs">{{$message}}</div>@enderror
</div>
