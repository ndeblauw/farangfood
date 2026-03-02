<x-site-layout>

    <h1 class="font-bold text-2xl mb-4">Create a new food type</h1>

    <form class="flex flex-col gap-4" action="/home/food" method="post">

        @csrf

        <x-text-input name="name" placeholder="Food Name" label="Food name"/>

        <div>
            <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase">Create</button>
        </div>

    </form>

</x-site-layout>
