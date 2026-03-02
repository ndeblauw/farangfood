<x-site-layout>

    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <h1 class="font-bold text-2xl mb-4">
            List of food types
        </h1>

        <div>
            <a href="/home/food/create" class="bg-sky-900 text-sky-50 p-1">Create Foodtype</a>
        </div>

    </div>

    <ul class="list-disc list-inside">
        @foreach($food as $fooditem)
            <li class="hover:bg-sky-200 w-2/3 flex items-center justify-between">
                <span>
                    {{$fooditem->name}}
                </span>
                <div>
                    <a href="/home/food/{{$fooditem->id}}/edit" class="text-sky-700 hover:bg-sky-300">Edit</a>
                    |
                    <form action="/home/food/{{$fooditem->id}}" method="post" class="inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="text-sky-700 hover:bg-sky-300">Delete</button>
                    </form>
                </div>
            </li>

        @endforeach
    </ul>

</x-site-layout>
