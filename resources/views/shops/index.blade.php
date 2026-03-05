<x-site-layout title="List of shops">
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <h1 class="text-3xl font-semibold tracking-tight text-slate-900">Shop directory</h1>
        <p class="mt-2 text-sm text-slate-600">Browse restaurants, cafes, and local spots around Bangkok.</p>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($shops as $shop)
                <a href="{{ route('shops.show', $shop->id) }}" class="group rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition hover:border-sky-300 hover:bg-sky-50">
                    <p class="text-base font-semibold text-slate-900 transition group-hover:text-sky-900">{{ $shop->name }}</p>
                    <p class="mt-1 text-sm text-slate-600">Open details, foods, and reviews.</p>
                </a>
            @empty
                <p class="sm:col-span-2 lg:col-span-3 text-sm text-slate-500">No shops are available yet.</p>
            @endforelse
        </div>
    </section>

</x-site-layout>
