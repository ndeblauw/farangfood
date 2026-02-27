<x-site-layout>

    <h1 class="text-2xl font-bold">Details of {{$shop->name}}</h1>
    <p><em>{{$shop->address}}</em></p>
    <p>{{$shop->description}}</p>

    <div class="mt-6 mb-2">
        <h2 class="inline text-xl font-bold text-sky-50 bg-sky-700">Foods present</h2>
        <ul class="list-disc list-inside">
            @foreach($shop->foods as $food)
                <li>{{$food->name}}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6 mb-2">
        <h2 class="inline text-xl font-bold text-sky-50 bg-sky-700">Reviews</h2>
        <ul class="list-disc list-inside">
            @foreach($shop->reviews as $review)
                <li>
                    <strong>{{$review->author->name}}:</strong>
                    {{$review->comment}}
                </li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('shops.index') }}">Back to list of shops</a>

</x-site-layout>
