<x-site-layout>

    <h1 class="font-bold text-2xl mb-4">Edit {{$food->name}}</h1>

    <form class="flex flex-col gap-4" action="{{route('home.food.update', $food->id)}}" method="post">

        @method('put')
        @csrf

        <x-text-input name="name" placeholder="Food Name" label="Food name" value="{{$food->name}}"/>

        <div>
            <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase">Update</button>
        </div>

    </form>

</x-site-layout>
