<html>
<head>
    <title>List of Shops</title>
</head>
<body>

    <h1>List of Shops</h1>
    <ul>
        @foreach($shops as $shop)
            <li> <a href="{{ route('shops.show', $shop) }}">{{ $shop }}</a></li>
        @endforeach
    </ul>
</body>
</html>

