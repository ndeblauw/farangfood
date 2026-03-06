<x-site-layout>
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <h1 class="text-3xl font-semibold tracking-tight text-slate-900">{{ $food->name }}</h1>
            <a href="{{ route('food.index') }}" class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">Back to food list</a>
        </div>

        <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200">
            <img
                class="h-40 w-full object-cover sm:h-48 lg:h-56"
                src="{{ $food->bannerImageUrl() }}"
                alt="{{ $food->name }} banner image"
            >
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
