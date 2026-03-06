<x-site-layout>
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <h1 class="text-3xl font-semibold tracking-tight text-slate-900">Food collection</h1>
        <p class="mt-2 text-sm text-slate-600">Explore dishes that are currently listed across our featured shops.</p>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($foods as $food)

                <a href="{{ route('food.show', $food->id) }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 transition hover:border-sky-300">
                    <img class="h-52 w-full object-cover" src="{{ $food->coverImageUrl() }}" alt="{{ $food->name }} cover image">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-slate-900/15 to-transparent"></div>

                    <div class="absolute bottom-4 left-4 right-4">
                        <p class="text-lg font-semibold text-sky-100 transition group-hover:text-white">{{ $food->name }}</p>
                        <p class="mt-1 text-sm text-sky-100/90">View shops that offer this dish.</p>
                    </div>
                </a>
            @empty
                <p class="sm:col-span-2 lg:col-span-3 text-sm text-slate-500">No food entries yet. Please check back soon.</p>
            @endforelse
        </div>
    </section>

</x-site-layout>
