<x-site-layout>

    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <h1 class="font-bold text-2xl mb-4">
            List of shops
        </h1>

        <div>
            <a href="/home/shops/create" class="bg-sky-900 text-sky-50 p-1">Create Shop</a>
        </div>

    </div>

    <ul class="list-disc list-inside">
        @foreach($shops as $shop)
            <li class="hover:bg-sky-200 w-2/3 flex items-center justify-between">
                <span>
                    {{$shop->name}}
                    <span class="text-gray-500 text-sm">({{$shop->author->name}})</span>
                </span>
                <div class="flex items-center gap-2">
                    @if($shop->is_published)
                        <a href="/home/shops/{{$shop->id}}/unpublish" class="text-red-700 hover:bg-red-300"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-3">
                                <path fill-rule="evenodd" d="M2.232 12.207a.75.75 0 0 1 1.06.025l3.958 4.146V6.375a5.375 5.375 0 0 1 10.75 0V9.25a.75.75 0 0 1-1.5 0V6.375a3.875 3.875 0 0 0-7.75 0v10.003l3.957-4.146a.75.75 0 0 1 1.085 1.036l-5.25 5.5a.75.75 0 0 1-1.085 0l-5.25-5.5a.75.75 0 0 1 .025-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <a href="/home/shops/{{$shop->id}}/publish" class="text-green-700 hover:bg-green-300">Publish</a>
                    @endif
                    |


                    <a href="/home/shops/{{$shop->id}}/edit" class="text-sky-700 hover:bg-sky-300">Edit</a>
                    |
                    <form action="/home/shops/{{$shop->id}}" method="post" class="inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="text-sky-700 hover:bg-sky-300">Delete</button>
                    </form>
                </div>
            </li>

        @endforeach
    </ul>

</x-site-layout>
