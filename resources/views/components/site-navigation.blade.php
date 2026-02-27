<nav class="bg-sky-900 text-sky-50">

    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <ul class="flex space-x-4 p-4">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('shops.index')}}">Shops</a></li>
        </ul>

        @if (Route::has('login'))
            <div class="flex items-center justify-end gap-4">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="">
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif



    </div>




</nav>
