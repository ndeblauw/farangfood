<x-site-layout>

    <h1 class="font-bold text-2xl mb-4">Edit info of {{$shop->name}}</h1>

    <form class="flex flex-col gap-4" action="/home/shops/{{$shop->id}}" method="post">

        @csrf
        @method('put')

        <x-text-input name="name" placeholder="Full name" label="Shop name" value="{{$shop->name}}"/>
        <x-text-input name="address" placeholder="Street, nr, zip, city" label="Shop Address" value="{{$shop->address}}"/>

        <x-select
            name="food_type"
            label="Food type"
            :options="['Cafe' => 'Cafe (or coffee shop)', 'Restaurant' => 'Restaurant (serving food)', 'Takeaway' => 'Takeaway (serving food to go)', 'Fast Food' => 'Fast food']"
            value="{{$shop->food_type}}"
        />

        <x-radiobuttons
            name="price_level"
            label="Price category"
            :options="['unknown' => 'Unknown', 'cheap' => '&#3647; (budget)', 'moderate' => '&#3647;&#3647; (mid-range)', 'expensive' => '&#3647;&#3647;&#3647; (expensive)']"
            value="{{$shop->price_level}}"
            inline="1"
        />

        <x-text-area name="description" placeholder="Describe the shop and its food" value="{{$shop->description}}" label="Description"/>

        <x-checkboxes
            name="foods"
            label="What can you eat there?"
            :options="\App\Models\Food::orderBy('name')->pluck('name','id')->toArray()"
            :values="$shop->foods->pluck('id')->toArray()"
        />

        <div>
            <button type="submit" class="bg-sky-800 text-sky-50 p-2 uppercase">Update</button>
        </div>

    </form>

</x-site-layout>
