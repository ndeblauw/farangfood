<html>
<head>
    <title>List of Shops</title>
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


    <h1>List of Shops</h1>
    <ul>
        @foreach($shops as $shop)
            <li> <a href="{{ route('shops.show', $shop->id) }}">{{ $shop->name }}</a></li>
        @endforeach
    </ul>
</div>
</body>
</html>

