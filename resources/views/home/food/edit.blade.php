<x-site-layout>

    <h1 class="font-bold text-2xl mb-4">Edit {{$food->name}}</h1>

    <form class="flex flex-col gap-4" action="{{route('home.food.update', $food->id)}}" method="post">

        @method('put')
        @csrf

        <div>
            <label for="name" class="font-semibold text-sm">Food name</label><br/>
            <input type="text" id="name" name="name" placeholder="Food Name" value="{{$food->name}}" class="p-1 border border-sky-700">
        </div>
        <div>
            <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase">Update</button>
        </div>

    </form>

</x-site-layout>
