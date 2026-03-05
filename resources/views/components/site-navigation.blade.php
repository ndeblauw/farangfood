<nav class="border-b border-sky-100 bg-white/95 text-slate-800 backdrop-blur-sm">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-16 items-center justify-between gap-4 py-2">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-md px-2 py-1 text-base font-semibold text-sky-900 transition hover:text-sky-700">
                <span class="inline-flex size-8 items-center justify-center rounded-full bg-sky-100 text-sm font-bold text-sky-700">FF</span>
                <span>Food For Farang</span>
            </a>

            <ul class="hidden items-center gap-1 md:flex">
                @foreach ($menu_items as $item)
                    <li>
                        <a
                            href="{{ $item['url'] }}"
                            class="inline-flex rounded-md px-3 py-2 text-sm font-medium transition {{ request()->routeIs($item['route']) ? 'bg-sky-700 text-white' : 'text-slate-700 hover:bg-sky-100 hover:text-sky-900' }}"
                        >
                            {{ $item['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            @if (Route::has('login'))
                <div class="hidden items-center gap-2 md:flex">
                    @auth
                        <a href="{{ route('dashboard') }}" class="rounded-md border border-sky-200 px-3 py-2 text-sm font-medium text-sky-800 transition hover:border-sky-300 hover:bg-sky-50">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md bg-sky-700 px-3 py-2 text-sm font-medium text-white transition hover:bg-sky-800">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <details class="pb-4 md:hidden">
            <summary class="cursor-pointer rounded-md border border-slate-200 px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                Menu
            </summary>

            <div class="mt-3 space-y-2 rounded-xl border border-slate-200 bg-white p-3 shadow-sm">
                @foreach ($menu_items as $item)
                    <a
                        href="{{ $item['url'] }}"
                        class="block rounded-md px-3 py-2 text-sm font-medium transition {{ request()->routeIs($item['route']) ? 'bg-sky-700 text-white' : 'text-slate-700 hover:bg-sky-100 hover:text-sky-900' }}"
                    >
                        {{ $item['name'] }}
                    </a>
                @endforeach

                @if (Route::has('login'))
                    <div class="mt-3 border-t border-slate-200 pt-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="block rounded-md border border-sky-200 px-3 py-2 text-sm font-medium text-sky-800 transition hover:border-sky-300 hover:bg-sky-50">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="mb-2 block rounded-md px-3 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block rounded-md bg-sky-700 px-3 py-2 text-center text-sm font-medium text-white transition hover:bg-sky-800">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </details>
    </div>
</nav>
