<x-site-layout>
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <h1 class="text-3xl font-semibold tracking-tight text-slate-900">Food collection</h1>
        <p class="mt-2 text-sm text-slate-600">Explore dishes that are currently listed across our featured shops.</p>

        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($foods as $food)
                <a href="{{ route('food.show', $food->id) }}" class="group rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition hover:border-sky-300 hover:bg-sky-50">
                    <p class="text-base font-semibold text-slate-900 transition group-hover:text-sky-900">{{ $food->name }}</p>
                    <p class="mt-1 text-sm text-slate-600">View shops that offer this dish.</p>
                </a>
            @empty
                <p class="sm:col-span-2 lg:col-span-3 text-sm text-slate-500">No food entries yet. Please check back soon.</p>
            @endforelse
        </div>
    </section>

</x-site-layout>
