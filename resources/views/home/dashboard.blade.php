<x-site-layout>

    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div>
            Welcome to your dashboard, {{ auth()->user()->name }}!
        </div>

        <div>
            @if( auth()->user()->is_admin)
            <a href="/home/food">Manage Foodtype</a>
            @endif
            <a href="/home/shops">Manage shops</a>
        </div>

    </div>


</x-site-layout>
