<x-site-layout>
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <h1 class="text-3xl font-semibold tracking-tight text-slate-900">Food collection</h1>
        <p class="mt-2 text-sm text-slate-600">Explore dishes that are currently listed across our featured shops.</p>

        <div class="mt-6 space-y-4">
            @forelse ($foods as $food)

                <a href="{{ route('food.show', $food->id) }}" class="group flex flex-col gap-4 rounded-2xl border border-slate-200 bg-slate-50/70 p-4 transition hover:border-sky-300 hover:bg-sky-50 sm:flex-row sm:items-center">
                    <img class="h-40 w-full rounded-xl object-cover sm:h-32 sm:w-52" src="{{ $food->coverImageUrl() }}" alt="{{ $food->name }} cover image">

                    <div class="min-w-0">
                        <p class="text-lg font-semibold text-slate-900 transition group-hover:text-sky-900">{{ $food->name }}</p>
                        <p class="mt-1 text-sm text-slate-600">View shops that offer this dish.</p>
                    </div>
                </a>
            @empty
                <p class="text-sm text-slate-500">No food entries yet. Please check back soon.</p>
            @endforelse
        </div>
    </section>

</x-site-layout>
