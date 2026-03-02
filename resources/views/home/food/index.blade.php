<x-site-layout>

    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <h1 class="font-bold text-2xl mb-4">
            List of food types
        </h1>

        <div>
        </div>

    </div>

    <ul class="list-disc list-inside">
        @foreach($food as $fooditem)
            <li>{{$fooditem->name}}</li>

        @endforeach
    </ul>

</x-site-layout>
