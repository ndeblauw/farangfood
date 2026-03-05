<x-site-layout>
    <section class="grid gap-6 lg:grid-cols-2 lg:items-stretch">
        <article class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
            <p class="inline-flex rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-sky-700">Bangkok Food Guide</p>
            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-900 sm:text-4xl">Find your next favorite meal in Bangkok.</h1>
            <p class="mt-4 max-w-xl text-base leading-relaxed text-slate-600">Food For Farang helps you browse local shops, discover dishes, and explore trusted spots from the community.</p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('shops.index') }}" class="rounded-lg bg-sky-700 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-sky-800">Browse shops</a>
                <a href="{{ route('food.index') }}" class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">See food list</a>
            </div>
        </article>

        <article class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-sky-700 via-cyan-700 to-emerald-700 p-6 shadow-sm sm:p-8">
            <img src="/img/logo.png" alt="Thai food" class="h-56 w-full rounded-2xl object-cover object-center sm:h-72" />

            <div class="mt-6 grid gap-3 sm:grid-cols-2">
                <div class="rounded-xl bg-white/90 p-4">
                    <p class="text-2xl font-semibold text-slate-900">Local shops</p>
                    <p class="mt-1 text-xs uppercase tracking-wide text-slate-600">Curated and growing</p>
                </div>
                <div class="rounded-xl bg-white/90 p-4">
                    <p class="text-2xl font-semibold text-slate-900">Food highlights</p>
                    <p class="mt-1 text-xs uppercase tracking-wide text-slate-600">Classic and modern picks</p>
                </div>
            </div>
        </article>
    </section>

    <section class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">City-focused picks</h2>
            <p class="mt-2 text-sm text-slate-600">Start with neighborhood favorites and discover where each dish shines.</p>
        </div>
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Simple navigation</h2>
            <p class="mt-2 text-sm text-slate-600">Use a clearer menu on desktop and phone to move between key pages quickly.</p>
        </div>
        <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200 sm:col-span-2 lg:col-span-1">
            <h2 class="text-lg font-semibold text-slate-900">Built for any screen</h2>
            <p class="mt-2 text-sm text-slate-600">The layout scales from phone to laptop while keeping content readable and balanced.</p>
        </div>
    </section>
</x-site-layout>
