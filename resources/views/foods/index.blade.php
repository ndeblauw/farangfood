<x-site-layout>

@foreach($foods as $food)
    <a href="{{ route('food.show', $food->id) }}">
    {{$food->name}}
    </a>
@endforeach

</x-site-layout>
