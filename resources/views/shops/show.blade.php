<x-site-layout title="{{$shop->name}}">
    <section class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200 sm:p-8">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <h1 class="text-3xl font-semibold tracking-tight text-slate-900">{{ $shop->name }}</h1>
            <a href="{{ route('shops.index') }}" class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">Back to shops</a>
        </div>

        <p class="mt-3 text-sm text-slate-500">{{ $shop->address }}</p>
        <p class="mt-2 max-w-3xl text-sm leading-relaxed text-slate-700">{{ $shop->description }}</p>

        <div class="mt-8">
            <h2 class="text-base font-semibold text-slate-900">Foods available</h2>
            <div class="mt-3 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($shop->foods as $food)
                    <a href="{{ route('food.show', $food->id) }}" class="rounded-xl border border-slate-200 bg-slate-50/70 p-4 transition hover:border-sky-300 hover:bg-sky-50">
                        <p class="font-semibold text-slate-900">{{ $food->name }}</p>
                        <p class="mt-1 text-sm text-slate-600">Open food detail page.</p>
                    </a>
                @empty
                    <p class="sm:col-span-2 lg:col-span-3 text-sm text-slate-500">No foods linked to this shop yet.</p>
                @endforelse
            </div>
        </div>

        <div class="mt-8">
            <h2 class="text-base font-semibold text-slate-900">Recent reviews</h2>
            <div class="mt-3 space-y-3">
                @forelse ($shop->reviews as $review)
                    <article class="rounded-xl border border-slate-200 bg-slate-50/70 p-4">
                        <p class="text-sm font-semibold text-slate-900">{{ $review->author->name }}</p>
                        <p class="mt-1 text-sm text-slate-700">{{ $review->comment }}</p>
                        <div class="mt-2 flex items-center justify-between gap-3">
                            <p class="text-xs font-medium text-slate-500">Likes: {{ $review->likes_count }} · Dislikes: 0</p>

                            @auth
                                @if ($review->isLikedBy(auth()->user()))
                                    <form method="POST" action="{{ route('reviews.likes.destroy', $review->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-md border border-slate-300 px-3 py-1 text-xs font-medium text-slate-700 transition hover:border-slate-400 hover:bg-slate-100">
                                            Unlike
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('reviews.likes.store', $review->id) }}">
                                        @csrf
                                        <button type="submit" class="rounded-md border border-sky-300 bg-sky-50 px-3 py-1 text-xs font-medium text-sky-700 transition hover:border-sky-400 hover:bg-sky-100">
                                            Like
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </article>
                @empty
                    <p class="text-sm text-slate-500">No reviews yet.</p>
                @endforelse
            </div>
        </div>
    </section>

</x-site-layout>
