<x-layout>
    <x-page-heading>Products</x-page-heading>

    <table class="text-center mx-auto border border-black">
        <tr class="bg-gray-500/20">
            <x-table-element>#</x-table-element>
            <x-table-element>Title</x-table-element>
            <x-table-element>Quantity</x-table-element>
            <x-table-element>Price</x-table-element>
            <x-table-element>Total price with VAT</x-table-element>
            @can('manipulate-products')
                <x-table-element>Open</x-table-element>
            @endcan
        </tr>
        @foreach($products as $product)

            @php
                $quantity = (float) $product->quantity;
                $price = (float) $product->price;
                $vat = (float) config('app.VAT');

                $totalPriceWithVat = $quantity*$price*(1+$vat);
            @endphp

            <tr>
                <x-table-element>{{ $product->id }}</x-table-element>
                <x-table-element>{{ $product->item_name }}</x-table-element>
                <x-table-element>{{ $product->quantity }}</x-table-element>
                <x-table-element>{{ $product->price }}</x-table-element>
                <x-table-element>{{ $totalPriceWithVat }}</x-table-element>
                @can('manipulate-products')
                    <x-table-element><a href="/products/{{$product->id}}" class="hover:underline text-blue-900">&#10022;</a></x-table-element>
                @endcan
            </tr>
        @endforeach
    </table>
    @can('manipulate-products')
        <div class="flex justify-between mt-10">
            <x-link href="/products/create">Create Product</x-link>

            <form action="/products/audit" method="POST" class="text-center relative">
                @csrf

                <x-forms.input type="date" name="start_date" value="{{old('start_date')}}"/>
                <label for="start_date" class="absolute left-3 bottom-9">From:</label>

                <x-forms.input type="date" name="end_date" value="{{old('end_date')}}"/>
                <label for="end_date" class="absolute left-44 bottom-9">Until:</label>
                
                <x-button>Show Audit</x-button>

                @foreach ($errors->all() as $error)
                    <p class="text-sm text-red-900 mt-2">{{ $error }}</p>
                @endforeach
            </form>
        </div>
    @endcan
</x-layout>