<x-site-layout>
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="relative overflow-hidden rounded-2xl border border-slate-200">
            <img
                class="h-52 w-full object-cover sm:h-64 lg:h-72"
                src="{{ $food->bannerImageUrl() }}"
                alt="{{ $food->name }} banner image"
            >

            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-slate-900/15 to-transparent"></div>

            <a href="{{ route('food.index') }}" class="absolute right-4 top-4 rounded-md border border-sky-100/70 bg-slate-900/35 px-3 py-1.5 text-sm font-medium text-sky-100 backdrop-blur-sm transition hover:bg-slate-900/50">Back to food list</a>

            <div class="absolute bottom-4 left-4">
                <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-100/90">Food type</p>
                <h1 class="mt-1 text-3xl font-semibold tracking-tight text-sky-100 sm:text-4xl">{{ $food->name }}</h1>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-base font-semibold text-slate-900">Available at these shops</h2>

            <div class="mt-3 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($food->shops as $shop)
                    <a href="{{ route('shops.show', $shop->id) }}" class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition hover:border-sky-300 hover:bg-sky-50">
                        <p class="font-semibold text-slate-900">{{ $shop->name }}</p>
                        <p class="mt-1 text-sm text-slate-600">See shop details and reviews.</p>
                    </a>
                @empty
                    <p class="sm:col-span-2 lg:col-span-3 text-sm text-slate-500">No shops are linked to this food yet.</p>
                @endforelse
            </div>
        </div>
    </section>

</x-site-layout>
