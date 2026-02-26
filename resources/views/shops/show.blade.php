<html>
<head>
    <title>Details of {{$shop->name}}</title>
</head>
<body>

<h1>Details of {{$shop->name}}</h1>
<p><em>{{$shop->address}}</em></p>
<p>{{$shop->description}}</p>

<a href="{{ route('shops.index') }}">Back to list of shops</a>
</body>
</html>

