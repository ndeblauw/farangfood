<x-site-layout>

    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <div>
            Welcome to your dashboard, {{ auth()->user()->name }}!
        </div>

        <div>
            <a href="/home/food">Manage Foodtype</a>
        </div>

    </div>


</x-site-layout>
