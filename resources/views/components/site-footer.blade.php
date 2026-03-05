<footer class="border-t border-sky-100 bg-white">
    <div class="mx-auto grid w-full max-w-7xl gap-8 px-4 py-8 text-sm text-slate-600 sm:px-6 md:grid-cols-3 lg:px-8">
        <div>
            <p class="text-base font-semibold text-slate-900">Food For Farang</p>
            <p class="mt-2 max-w-sm">Discover where to eat in Bangkok with curated shops, food highlights, and community reviews.</p>
        </div>

        <div>
            <p class="text-base font-semibold text-slate-900">Explore</p>
            <div class="mt-2 space-y-2">
                <a href="{{ route('home') }}" class="block transition hover:text-sky-700">Home</a>
                <a href="{{ route('shops.index') }}" class="block transition hover:text-sky-700">Shops</a>
                <a href="{{ route('food.index') }}" class="block transition hover:text-sky-700">Food</a>
            </div>
        </div>

        <div>
            <p class="text-base font-semibold text-slate-900">Account</p>
            <div class="mt-2 space-y-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="block transition hover:text-sky-700">Dashboard</a>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="block transition hover:text-sky-700">Log in</a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block transition hover:text-sky-700">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>

    <div class="border-t border-sky-100 bg-sky-50/50 px-4 py-4 text-center text-xs text-slate-500 sm:px-6 lg:px-8">
        &copy; {{ now()->year }} Food For Farang. Built for discovering local flavors.
    </div>
</footer>
