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

            <tr>
                <x-table-element>{{ $product->id }}</x-table-element>
                <x-table-element>{{ $product->item_name }}</x-table-element>
                <x-table-element>{{ $product->quantity }}</x-table-element>
                <x-table-element>{{ $product->price }}</x-table-element>
                <x-table-element>{{ $product->totalPriceWithVat() }}</x-table-element>
                @can('manipulate-products')
                    <x-table-element><a href="/products/{{$product->id}}" class="hover:underline text-blue-900">&#10022;</a></x-table-element>
                @endcan
            </tr>
        @endforeach
    </table>
    <div class="w-2/5 mt-6">
        {{ $products->links() }}
    </div>
    @can('manipulate-products')
        <div class="flex justify-center my-10">
            <x-link href="/products/create">Create Product</x-link>
        </div>
    @endcan
</x-layout>