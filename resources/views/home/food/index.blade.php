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
            <li>
                {{$fooditem->name}}
                <a href="/home/food/{{$fooditem->id}}/edit" class="text-sky-700 hover:bg-sky-200">Edit</a>
            </li>

        @endforeach
    </ul>

</x-site-layout>
