<x-site-layout>

    <h1 class="font-bold text-2xl mb-4">Create a new shop</h1>

    <form class="flex flex-col gap-4" action="/home/shops" method="post">

        @csrf

        <x-text-input name="name" placeholder="Full name" label="Shop name"/>
        <x-text-input name="address" placeholder="Street, nr, zip, city" label="Shop Address"/>

        <x-select
            name="food_type"
            label="Food type"
            :options="['Cafe' => 'Cafe (or coffee shop)', 'Restaurant' => 'Restaurant (serving food)', 'Takeaway' => 'Takeaway (serving food to go)', 'Fast Food' => 'Fast food']"
        />

        <x-radiobuttons
            name="price_level"
            label="Price category"
            :options="['unknown' => 'Unknown', 'cheap' => '&#3647; (budget)', 'moderate' => '&#3647;&#3647; (mid-range)', 'expensive' => '&#3647;&#3647;&#3647; (expensive)']"
            inline="1"
        />

        <x-text-area name="description" placeholder="Describe the shop and its food" label="Description"/>

        <div>
            <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase">Create</button>
        </div>

    </form>

</x-site-layout>
