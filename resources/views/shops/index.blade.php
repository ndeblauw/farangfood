<x-site-layout>

    <h1 class="text-2xl font-bold">List of Shops</h1>
    <ul class="list-disc list-inside">
        @foreach($shops as $shop)
            <li> <a href="{{ route('shops.show', $shop->id) }}">{{ $shop->name }}</a></li>
        @endforeach
    </ul>

</x-site-layout>
