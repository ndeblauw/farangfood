<html>
<head>
    <title>Details of {{$shop->name}}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-purple-200">

<div class="bg-purple-900 text-purple-50">

    <ul class="flex space-x-4 p-4">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('shops.index')}}">Shops</a></li>
    </ul>

</div>

<div class="p-4">

    <h1 class="text-2xl font-bold">Details of {{$shop->name}}</h1>
    <p><em>{{$shop->address}}</em></p>
    <p>{{$shop->description}}</p>

    <div class="mt-6 mb-2">
        <h2 class="inline text-xl font-bold text-purple-50 bg-purple-700">Foods present</h2>
        <ul class="list-disc list-inside">
            @foreach($shop->foods as $food)
                <li>{{$food->name}}</li>
            @endforeach
        </ul>

    </div>

    <div class="mt-6 mb-2">
        <h2 class="inline text-xl font-bold text-purple-50 bg-purple-700">Reviews</h2>
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
</div>
</body>
</html>

